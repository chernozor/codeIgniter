<?php

namespace App\Controllers;

use App\Models\CommentModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Comment extends BaseController
{
    public function index(): string
    {
        $model = model(CommentModel::class);

        $data['comments'] = $model->getComments();
        $data['title'] = 'All Comments';

        return view('templates/header', $data)
            . view('comment/index')
            . view('templates/footer');
    }

    public function show($id = null): string
    {
        //refactor to getModel($id)
        $model = model(CommentModel::class);

        if (!$id) {
            throw new PageNotFoundException('Cannot find the comment: ' . $id);
        }

        $comment = $model->getComments($id);

        if (!$comment) {
            throw new PageNotFoundException('Cannot find the comment: ' . $id);
        }

        return view('templates/header', ['title' => $comment['name']])
            . view('comment/view', ['comment' => $comment])
            . view('templates/footer');
    }

    public function delete($id = null): string
    {
        //refactor to getModel($id)
        $model = model(CommentModel::class);

        if (!$id) {
            throw new PageNotFoundException('Cannot find the comment: ' . $id);
        }

        $comment = $model->getComments($id);

        if (!$comment) {
            throw new PageNotFoundException('Cannot find the comment: ' . $id);
        }

        $comment->delete($id);

        return view('templates/header', ['title' => 'Deleted'])
            . view('comment/deleted')
            . view('templates/footer');
    }

    public function new($errors = []): string
    {
        helper('form');

        return view('templates/header', ['title' => 'Create new comment'])
            . view('comment/create', ['errors' => $errors])
            . view('templates/footer');
    }

    //add post logic to edit
    public function edited(): string
    {
        return view('templates/header', ['title' => 'Edited'])
            . view('comment/edited')
            . view('templates/footer');
    }

    public function edit($id = null): string
    {
        //refactor to getModel($id)
        $model = model(CommentModel::class);

        if (!$id) {
            throw new PageNotFoundException('Cannot find the comment: ' . $id);
        }

        $comment = $model->getComments($id);

        if (!$comment) {
            throw new PageNotFoundException('Cannot find the comment: ' . $id);
        }

        return view('templates/header', ['title' => $comment['name']])
            . view('comment/edit', ['comment' => $comment])
            . view('templates/footer');
    }

    public function create(): string
    {
        helper('form');

        $data = $this->request->getPost(['name', 'text']);

        if (!$this->validateData($data, [
            'name' => 'required|max_length[255]|min_length[6]|valid_email',
            'text' => 'required|max_length[2000]|min_length[1]',
        ])) {
            $errors = $this->validator->getErrors();
            return $this->new($errors);
        }

        $post = $this->validator->getValidated();
        $model = model(CommentModel::class);

        if ($model->save([
                'name' => $post['name'],
                'text' => $post['text'],
                'date' => time(),
            ]) === false) {
            return $this->new($model->errors());
        }

        return view('templates/header', ['title' => 'Create new comment'])
            . view('comment/success')
            . view('templates/footer');
    }
}
