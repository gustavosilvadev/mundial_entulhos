 <!-- Right Sidebar starts -->
 <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <form action="/cad_usuario" id="form-modal-todo" method="POST" class="todo-modal needs-validation" novalidate onsubmit="return false">
                @csrf
                <div class="modal-header align-items-center mb-1">
                    <!-- <h5 class="modal-title">Criar Usuário</h5> -->
                    <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                        <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal" aria-label="Close">
                            ×
                        </button>
                    </div>
                </div>
                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <div class="action-tags">

                        <div class="form-group">
                            <div class="form-group mb-2">
                                <label for="blog-edit-title">Nome</label>
                                <input type="text" name="nome" id="blog-edit-title" class="form-control" value="" />
                            </div>                                                
                        </div>

                        <div class="form-group">
                            <div class="form-group mb-2">
                                <label for="blog-edit-title">Sobrenome</label>
                                <input type="text" name="sobrenome" id="blog-edit-title" class="form-control" value="" />
                            </div>                                                
                        </div>

                        <div class="form-group">
                            <div class="form-group mb-2">
                                <label for="blog-edit-title">Email</label>
                                <input type="email" name="email" id="blog-edit-title" class="form-control" value="" />
                            </div>                                                
                        </div>

                        <div class="form-group">
                            <div class="form-group mb-2">
                                <label for="blog-edit-title">Login</label>
                                <input type="text" name="login" id="blog-edit-title" class="form-control" value="" />
                            </div>                                                
                        </div>

                        <div class="form-group">
                            <div class="form-group mb-2">
                                <label for="blog-edit-title">Senha</label>
                                <input type="password" name="senha" id="blog-edit-title" class="form-control" value="" />
                            </div>                                                
                        </div>

                        <div class="form-group">
                            <div class="form-group mb-2">
                                <label for="blog-edit-title">Repetir Senha</label>
                                <input type="password" name="repetir_senha" id="blog-edit-title" class="form-control" value="" />
                            </div>                                                
                        </div>

                    </div>
                    <div class="form-group my-1">
                        <button type="submit" class="btn btn-success d-none add-todo-item mr-1">Criar</button>
                        <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-warning d-none update-btn update-todo-item mr-1">Atualizar</button>
                        <button type="button" class="btn btn-outline-danger update-btn d-none" data-dismiss="modal">Deletar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Right Sidebar ends -->