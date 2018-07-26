<
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">

                        <table class="table">


                            <tr>
                                <th> login: </th>

                                <td> <?php echo htmlspecialchars($login, ENT_QUOTES); ?></td>

                            </tr>
                            <tr>
                                <th>About me:</th>

                                <td>  <?php echo htmlspecialchars($resume,ENT_QUOTES); ?></td>
                            </tr>
                        </table>


                            <td><a href="/account/edit/" class="btn btn-primary">Profile Edit</a></td>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>