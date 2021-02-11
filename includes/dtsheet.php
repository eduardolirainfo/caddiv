 <div class="container">
            <div class="left-align">
                <h2>Devedores</h2>
                <a href="cadpes.php"><button class="btn btn-largewaves-effect waves-light green accent-4" type="submit" name="action">Novo Cadastro
                        <i class="material-icons right">person_add</i>
                    </button></a>
            </div>
            <br><br>

            <!-- Modal of addNew -->
            <div class="modal" id="modalAddNew" role="dialog" aria-labelledby="ModalLabel-AddNew">
                <div class="modal-content">
                    <div class="row">
                        <h2>Add new Host</h2>
                        <form class="col s12" action="/host/create/" method="POST">
                            <input type="hidden" name="csrfmiddlewaretoken" value="flPjsq9ydzvCeMmdIN0mp1O3zTfchOfPQpRYYKNgDVRViZR87I74bPLj5tX1QBZI">

                            <div class="row">
                                <div class="input-field col s6">
                                    <select name="id_client" id="hostSelectAddIdClient">
                                        <option value="" disabled selected>Choose your option</option>

                                        <option value="43">Cobaia</option>

                                        <option value="49">DevilEnterprise</option>

                                        <option value="50">AngelCompany</option>

                                    </select>
                                    <label for="id_client" >Client name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input required name="hostname" type="text" value="">
                                    <label for="hostname">Hostname</label>
                                </div>
                                <div class="input-field col s6">
                                    <input required name="ip" type="text" value="">
                                    <label for='ip'>IP Address</label>
                                </div>
                                <!-- </div>
                                <div class="row"> -->
                                <div class="input-field col s12">
                                    <input required name="description" type="text" value="">
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn waves-effect waves-light green" type="submit" name="action">
                                    Add
                                    <i class="material-icons left">add</i>
                                </button>
                                <a class="modal-close btn waves-effect waves-light">
                                    Back
                                    <i class="material-icons left">exit_to_app</i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal of addNew -->

            <table class="table striped highlight centered responsive-table">
                <thead class="">
                <tr>
                    <th scope="col">Client Name</th>
                    <th scope="col">Hostname</th>
                    <th scope="col">Description</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>

                <tr>
                    <td>Cobaia</td>
                    <td>databasesServer</td>
                    <td>teste</td>
                    <td>
                        <a href="#modalReadDetail-15" class="btn btn-floating waves-effect waves-light modal-trigger blue" >
                            <i class="material-icons">info</i>
                        </a>
                        <a href="#modalUpdate-15" class="btn btn-floating waves-effect waves-light modal-trigger green" >
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="#modalDelete-15" class="btn btn-floating waves-effect waves-light modal-trigger red" >
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>

                <!-- Modal of ReadDetail -->

                <div class="modal" id="modalReadDetail-15" role="dialog" aria-labelledby="ModalLabel-ReadDetail">
                    <div class="modal-content">
                        <div class="row">
                            <h2>databasesServer</h2>
                            <ul>
                                <li>
                                    <b>Nome:</b> Cobaia
                                </li>
                                <li>
                                    <b>Documento:</b> databasesServer
                                </li>
                                <li>
                                    <b>IP Address:</b> 192.168.56.101
                                </li>
                                <li>
                                    <b>Description:</b> teste
                                </li>
                            </ul>
                            <div class="modal-footer">
                                <a class="modal-close btn waves-effect waves-light">
                                    Back
                                    <i class="material-icons left">exit_to_app</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal of update -->

                <div class="modal" id="modalUpdate-15" role="dialog" aria-labelledby="ModalLabel-Update">
                    <div class="modal-content">
                        <div class="row">
                            <h2>databasesServer</h2>
                        </div>
                        <form class="col s12" action="/host/update/15/" method="POST">
                            <input type="hidden" name="csrfmiddlewaretoken" value="flPjsq9ydzvCeMmdIN0mp1O3zTfchOfPQpRYYKNgDVRViZR87I74bPLj5tX1QBZI">

                            <div class="row">
                                <div class="input-field col s6"">
                                <select name="id_client" id="hostSelectUpdateIdClient">
                                    <option value="Clients object (43)" selected>Cobaia</option>

                                    <option value="43">Cobaia</option>

                                    <option value="49">DevilEnterprise</option>

                                    <option value="50">AngelCompany</option>

                                </select>
                                <label>Client name</label>
                            </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input required type="text" name="hostname" value="databasesServer">
                            <label for="hostname">Hostname</label>
                        </div>
                        <div class="input-field col s6">
                            <input required type="text" name="ip" value="192.168.56.101">
                            <label for="ip">IP Address</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input required type="text" name="description" value="teste">
                            <label for="description">Description</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn waves-effect waves-light green" type="submit">
                            Update
                            <i class="material-icons left">system_update_alt</i>
                        </button>
                        <a class="modal-close btn waves-effect waves-light">
                            Back
                            <i class="material-icons left">exit_to_app</i>
                        </a>
                    </div>
                    </form>
                </div> <!-- end modal content -->
        </div> <!-- end modal -->

        <!-- Modal of Delete -->

        <div class="modal" id="modalDelete-15" role="dialog" aria-labelledby="SmallModalLabel-Delete">
            <div class="modal-content">
                <div class="row">
                    <h2>Confirmation to delete</h2>
                </div>
                <div class="row">
                    <p>Deleting the Host, all dependents: Databases and Backup Policies will also be deleted.</p>
                    <p>Really want to delete the host <b>databasesServer</b>?</p>
                </div>
                <div class="modal-footer">
                    <a class="modal-close btn waves-effect waves-light">
                        Back
                        <i class="material-icons left">exit_to_app</i>
                    </a>
                    <a href="/hots/delete/15/" class="btn waves-effect waves-light red" type="submit" name="action">
                        Delete
                        <i class="material-icons left">delete_forever</i>
                    </a>
                </div>
            </div>
        </div>


        <tr>
            <td>DevilEnterprise</td>
            <td>angelServer01</td>
            <td>Angel Server</td>
            <td>
                <a href="#modalReadDetail-23" class="btn btn-floating waves-effect waves-light modal-trigger blue" >
                    <i class="material-icons">info</i>
                </a>
                <a href="#modalUpdate-23" class="btn btn-floating waves-effect waves-light modal-trigger green" >
                    <i class="material-icons">edit</i>
                </a>
                <a href="#modalDelete-23" class="btn btn-floating waves-effect waves-light modal-trigger red" >
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>

        <!-- Modal of ReadDetail -->

        <div class="modal" id="modalReadDetail-23" role="dialog" aria-labelledby="ModalLabel-ReadDetail">
            <div class="modal-content">
                <div class="row">
                    <h2>angelServer01</h2>
                    <ul>
                        <li>
                            <b>Client name:</b> DevilEnterprise
                        </li>
                        <li>
                            <b>Hostname:</b> angelServer01
                        </li>
                        <li>
                            <b>IP Address:</b> 1.1.1.1
                        </li>
                        <li>
                            <b>Client description:</b> Angel Server
                        </li>
                    </ul>
                    <div class="modal-footer">
                        <a class="modal-close btn waves-effect waves-light">
                            Back
                            <i class="material-icons left">exit_to_app</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal of update -->

        <div class="modal" id="modalUpdate-23" role="dialog" aria-labelledby="ModalLabel-Update">
            <div class="modal-content">
                <div class="row">
                    <h2>angelServer01</h2>
                </div>
                <form class="col s12" action="/host/update/23/" method="POST">
                    <input type="hidden" name="csrfmiddlewaretoken" value="flPjsq9ydzvCeMmdIN0mp1O3zTfchOfPQpRYYKNgDVRViZR87I74bPLj5tX1QBZI">

                    <div class="row">
                        <div class="input-field col s6"">
                        <select name="id_client" id="hostSelectUpdateIdClient">
                            <option value="Clients object (49)" selected>DevilEnterprise</option>

                            <option value="43">Cobaia</option>

                            <option value="49">DevilEnterprise</option>

                            <option value="50">AngelCompany</option>

                        </select>
                        <label>Client name</label>
                    </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input required type="text" name="hostname" value="angelServer01">
                    <label for="hostname">Hostname</label>
                </div>
                <div class="input-field col s6">
                    <input required type="text" name="ip" value="1.1.1.1">
                    <label for="ip">IP Address</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input required type="text" name="description" value="Angel Server">
                    <label for="description">Description</label>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn waves-effect waves-light green" type="submit">
                    Update
                    <i class="material-icons left">system_update_alt</i>
                </button>
                <a class="modal-close btn waves-effect waves-light">
                    Back
                    <i class="material-icons left">exit_to_app</i>
                </a>
            </div>
            </form>
        </div> <!-- end modal content -->
    </div> <!-- end modal -->

    <!-- Modal of Delete -->

    <div class="modal" id="modalDelete-23" role="dialog" aria-labelledby="SmallModalLabel-Delete">
        <div class="modal-content">
            <div class="row">
                <h2>Confirmation to delete</h2>
            </div>
            <div class="row">
                <p>Deleting the Host, all dependents: Databases and Backup Policies will also be deleted.</p>
                <p>Really want to delete the host <b>angelServer01</b>?</p>
            </div>
            <div class="modal-footer">
                <a class="modal-close btn waves-effect waves-light">
                    Back
                    <i class="material-icons left">exit_to_app</i>
                </a>
                <a href="/hots/delete/23/" class="btn waves-effect waves-light red" type="submit" name="action">
                    Delete
                    <i class="material-icons left">delete_forever</i>
                </a>
            </div>
        </div>
    </div>


    <tr>
        <td>DevilEnterprise</td>
        <td>devilServer01</td>
        <td>Devil Database</td>
        <td>
            <a href="#modalReadDetail-24" class="btn btn-floating waves-effect waves-light modal-trigger blue" >
                <i class="material-icons">info</i>
            </a>
            <a href="#modalUpdate-24" class="btn btn-floating waves-effect waves-light modal-trigger green" >
                <i class="material-icons">edit</i>
            </a>
            <a href="#modalDelete-24" class="btn btn-floating waves-effect waves-light modal-trigger red" >
                <i class="material-icons">delete</i>
            </a>
        </td>
    </tr>

    <!-- Modal of ReadDetail -->

    <div class="modal" id="modalReadDetail-24" role="dialog" aria-labelledby="ModalLabel-ReadDetail">
        <div class="modal-content">
            <div class="row">
                <h2>devilServer01</h2>
                <ul>
                    <li>
                        <b>Client name:</b> DevilEnterprise
                    </li>
                    <li>
                        <b>Hostname:</b> devilServer01
                    </li>
                    <li>
                        <b>IP Address:</b> 2.2.2.2
                    </li>
                    <li>
                        <b>Client description:</b> Devil Database
                    </li>
                </ul>
                <div class="modal-footer">
                    <a class="modal-close btn waves-effect waves-light">
                        Back
                        <i class="material-icons left">exit_to_app</i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal of update -->

    <div class="modal" id="modalUpdate-24" role="dialog" aria-labelledby="ModalLabel-Update">
        <div class="modal-content">
            <div class="row">
                <h2>devilServer01</h2>
            </div>
            <form class="col s12" action="/host/update/24/" method="POST">
                <input type="hidden" name="csrfmiddlewaretoken" value="flPjsq9ydzvCeMmdIN0mp1O3zTfchOfPQpRYYKNgDVRViZR87I74bPLj5tX1QBZI">

                <div class="row">
                    <div class="input-field col s6"">
                    <select name="id_client" id="hostSelectUpdateIdClient">
                        <option value="Clients object (49)" selected>DevilEnterprise</option>

                        <option value="43">Cobaia</option>

                        <option value="49">DevilEnterprise</option>

                        <option value="50">AngelCompany</option>

                    </select>
                    <label>Client name</label>
                </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input required type="text" name="hostname" value="devilServer01">
                <label for="hostname">Hostname</label>
            </div>
            <div class="input-field col s6">
                <input required type="text" name="ip" value="2.2.2.2">
                <label for="ip">IP Address</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input required type="text" name="description" value="Devil Database">
                <label for="description">Description</label>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn waves-effect waves-light green" type="submit">
                Update
                <i class="material-icons left">system_update_alt</i>
            </button>
            <a class="modal-close btn waves-effect waves-light">
                Back
                <i class="material-icons left">exit_to_app</i>
            </a>
        </div>
        </form>
    </div> <!-- end modal content -->
</div> <!-- end modal -->

<!-- Modal of Delete -->

<div class="modal" id="modalDelete-24" role="dialog" aria-labelledby="SmallModalLabel-Delete">
    <div class="modal-content">
        <div class="row">
            <h2>Confirmation to delete</h2>
        </div>
        <div class="row">
            <p>Deleting the Host, all dependents: Databases and Backup Policies will also be deleted.</p>
            <p>Really want to delete the host <b>devilServer01</b>?</p>
        </div>
        <div class="modal-footer">
            <a class="modal-close btn waves-effect waves-light">
                Back
                <i class="material-icons left">exit_to_app</i>
            </a>
            <a href="/hots/delete/24/" class="btn waves-effect waves-light red" type="submit" name="action">
                Delete
                <i class="material-icons left">delete_forever</i>
            </a>
        </div>
    </div>
</div>


</table>
</div>

</div>
</div>
