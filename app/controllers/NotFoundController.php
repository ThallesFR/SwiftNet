<?php

class NotFoundController extends RenderViews
{
    public function index()
    {
        $this->loadView('notFound',[
            'title' => 'NotFound'
        ]);
    }

}
