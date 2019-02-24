<?php

        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:doc,pdf,docx,zip'
        ]);

        if($request->hasfile('filenames'))  {
            foreach($request->file('filenames') as $file) {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }

         $file= new File();
         $file->filenames=json_encode($data);
         $file->save();
