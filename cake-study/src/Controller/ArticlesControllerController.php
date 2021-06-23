<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesController Controller
 *
 *
 * @method \App\Model\Entity\ArticlesController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesControllerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $articlesController = $this->paginate($this->ArticlesController);

        $this->set(compact('articlesController'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Controller id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesController = $this->ArticlesController->get($id, [
            'contain' => [],
        ]);

        $this->set('articlesController', $articlesController);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesController = $this->ArticlesController->newEntity();
        if ($this->request->is('post')) {
            $articlesController = $this->ArticlesController->patchEntity($articlesController, $this->request->getData());
            if ($this->ArticlesController->save($articlesController)) {
                $this->Flash->success(__('The articles controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles controller could not be saved. Please, try again.'));
        }
        $this->set(compact('articlesController'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Controller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesController = $this->ArticlesController->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesController = $this->ArticlesController->patchEntity($articlesController, $this->request->getData());
            if ($this->ArticlesController->save($articlesController)) {
                $this->Flash->success(__('The articles controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles controller could not be saved. Please, try again.'));
        }
        $this->set(compact('articlesController'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Controller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesController = $this->ArticlesController->get($id);
        if ($this->ArticlesController->delete($articlesController)) {
            $this->Flash->success(__('The articles controller has been deleted.'));
        } else {
            $this->Flash->error(__('The articles controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
