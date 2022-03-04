$my_pdf_path_for_example = 'my/really/cool/path/' . str_random(25) . '.pdf';
PDF::loadHTML('<h1>Test</h1> ')->save($my_pdf_path_for_example );
$model = SomeCoolModel::find(request('id') );
$model->path_to_pdf = $my_pdf_path_for_example ;
$model->save();
return response()
    ->download($my_pdf_path_for_example );
