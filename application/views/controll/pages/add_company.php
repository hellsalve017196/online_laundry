<div id="content">
    <section>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <div id="progress" style="display: none;height: 3%">
                    <div class="progress-bar" id="res" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                    </div>
                </div>

                <form id="add_company" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="regular13" class="col-sm-2 control-label">Company Name</label>
                        <div class="col-sm-10">
                            <input type="text" id="c_name" class="form-control" required><div class="form-control-line"></div><div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="regular13" class="col-sm-2 control-label">Work zone</label>
                        <div class="col-sm-10">
                            <input type="text" id="c_zone" class="form-control" required><div class="form-control-line"></div><div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="regular13" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" id="c_email" required class="form-control"><div class="form-control-line"></div><div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="regular13" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" id="c_phone" required class="form-control"><div class="form-control-line"></div><div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textarea13" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="textarea13" id="c_address" required id="textarea13" class="form-control" rows="3" placeholder=""></textarea><div class="form-control-line"></div><div class="form-control-line"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="regular13" class="col-sm-2 control-label">Company Logo</label>
                        <div class="col-sm-10">
                            <input type="file" id="c_logo" required class="form-control"><div class="form-control-line"></div><div class="form-control-line"></div>
                        </div>
                    </div>

                    <input type="submit" value="Adding Company" class="btn btn-block btn-success">
                </form>
            </div><!--end .card-body -->
        </div>

    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#add_company").on("submit",function(e) {

            var fd = new FormData();
            var data = {};

            data['c_name'] = $("#c_name").val();
            data['c_zone'] = $("#c_zone").val();
            data['c_email'] = $("#c_email").val();
            data['c_phone'] = $("#c_phone").val();
            data['c_address'] = $("#c_address").val();


            if(($.trim(data['c_name']) != '') && ($.trim(data['c_email']) != '') && ($.trim(data['c_phone']) != '') && ($.trim(data['c_address']) != ''))
            {
                $("#add_company").hide();
                $("#progress").show();

                file_data = JSON.stringify(data);

                fd.append("userfile", document.getElementById('c_logo').files[0]);
                fd.append("company", file_data);

                http = '<? echo base_url().'admin/add_company/' ?>';

                var xhr = new XMLHttpRequest();

                xhr.upload.addEventListener("progress", uploadProgress, false);
                xhr.upload.addEventListener("load", uploadComplete, false);
                xhr.upload.addEventListener("error", uploadFailed, false);
                xhr.upload.addEventListener("abort", uploadCanceled, false);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status == 200)
                    {
                        window.location = '<? echo base_url() ?>admin/add_service_view/'+xhr.responseText;
                    }
                }

                xhr.open("POST", http);

                xhr.setRequestHeader('Cache-Control','no-cache');

                xhr.send(fd);

                function uploadProgress(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                        document.getElementById("res").style.width = percentComplete.toString() + '%';
                        document.getElementById("res").innerHTML = percentComplete.toString() + '%';
                    }
                    else {
                        document.getElementById('progress').innerHTML = 'unable to compute';
                    }
                }

                function uploadComplete(evt) {
                    /* This event is raised when the server send back a response */

                }

                function uploadFailed(evt) {
                    alert("There was an error attempting to upload the file.");
                }

                function uploadCanceled(evt) {
                    alert("The upload has been canceled by the user or the browser dropped the connection.");
                }

            }
            else
            {
                alert("please fill up the form properly");
            }

            e.preventDefault();
        });
    });
</script>