<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Route;
use DB;
use File as FileSystem;
use App\File;

class FileController extends Controller
{
    public function postUploadMultiFile(Request $request)
    {
        $tableId = $request->input('tableId');
        $tableName = $request->input('tableName');
        $files = $request->file('file');
        if (empty($files)) {
            return response()->json(['msg' => 'File emplty'], 203);
        }
        foreach ($files as $file) {
            $fileNew = new File();
            $fileNew->fileName = $file->getClientOriginalName();
            $fileNew->fileExtension = $file->getClientOriginalExtension();
            $fileNew->mimeType = $file->getClientMimeType();
            $fileNew->size = $file->getClientSize();
            $fileNew->id_type = ($tableId == null || $tableId == "") ? 0 : $tableId;
            $fileNew->type = $tableName;
            if (!$fileNew->save()) {
                return response()->json(['msg' => 'Add File in database fail!'], 203);
            }
            $fileNew->filePath = "files/" . $tableName . "/" . $tableName . "_" . $fileNew->id . "." . $fileNew->fileExtension;
            if (!$fileNew->save()) {
                return response()->json(['msg' => 'Add File in database fail!'], 203);
            }

            //    Storage::put($file->getClientOriginalName(), file_get_contents($file->getRealPath()));
            if (!$file->move('../public/files/' . $tableName, $fileNew->filePath)) {
                return response()->json(['msg' => 'Add File in folder fail!'], 203);
            }
        }
        return response()->json(['msg' => 'success'], 201);
    }

    public function postRetrieveMultiFile(Request $request)
    {
        $tableId = $request->input('tableId');
        $tableName = $request->input('tableName');

        $files = DB::table('files')
            ->where('files.type', $tableName)
            ->where('files.id_type', $tableId)
            ->join($tableName . 's', $tableName . 's.id', '=', 'files.id_type')
            ->select('files.*')
            ->get();
        $response = [
            'msg'   => 'success',
            'files' => $files
        ];
        return response()->json($response, 201);
    }

    public function getDeleteFile(Request $request)
    {
        $fileId = Route::current()->getParameter('id');
        // $fileId = $request->input('_fileId');
        $file = File::findOrFail($fileId);

        if (!FileSystem::delete('../public/' . $file->filePath)) {
            return response()->json(['msg' => 'Delete file in folder fail!'], 203);
        }

        if (!$file->delete()) {
            return response()->json(['msg' => 'Delete File in database fail!'], 203);
        }

        $files = DB::table('files')
            ->where('files.type', $file->type)
            ->where('files.id_type', $file->id_type)
            ->join($file->type . 's', $file->type . 's.id', '=', 'files.id_type')
            ->select('files.*')
            ->get();
        $response = [
            'msg'   => 'success',
            'files' => $files
        ];
        return response()->json($response, 201);
    }

    public function getDownloadFile(Request $request)
    {
        $fileId = Route::current()->getParameter('id');

        $file = File::find($fileId);

        $pathToFile = public_path() . "/" . $file->filePath;

        $headers = array(
            'Content-Type: ' . $file->mimeType,
            'Content-Disposition: attachment; filename="' . $file->fileName . '"',
            'Content-Transfer-Encoding: binary',
            'Accept-Ranges: bytes',
            'Content-Length: ' . $file->size
        );

        $name = $file->fileName;

        return response()->download($pathToFile, $name, $headers);
    }
}
