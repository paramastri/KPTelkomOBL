<!DOCTYPE html>
<html>

<head>
    <title>Status Dokumen OBL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="../../favicon.png" type="png" sizes="16x16">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../style5.css">


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script>
        $(function() {

            $(".dropdown-menu").on('click', 'a', function() {
                $(".btn:first-child").text($(this).text());
                $(".btn:first-child").val($(this).text());
            });

        });

        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

</head>



<body>


    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <img style="height: 100px; margin-top: 30px;" src="../../logo.png" class="rounded mx-auto d-block">
            <div class="sidebar-header">
            <h6 style="text-align: center; color: black; background-color: white; border-radius: 30px; width: 90%;">Website Status OBL</h6>
            </div>


            <ul style="margin-left: 10px; margin-top: 30px;" class="list-unstyled">

                <li>
                    <a href="#">Form</a>
                </li>
                <li>
                    <a href="#">Data</a>
                </li>
            </ul>




        </nav>



        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="">

                    <button style="margin-right: 30px;" type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <h2 style="font-family:'GothamRounded-Medium'; float: right;">Berkas Dokumen OBL</h2>
                    <!--  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->



                </div>
            </nav>


<div style="font-family:'GothamRounded-Medium'; margin-bottom: 30px;"  class="table-responsive-sm">
    <table style="width: 20%; font-size: 13pt;">

  <tbody>
    <tr>
      <td>Nama CC</td>
      <td>: Mark</td>
    </tr>
    <tr>
      <td>Nama Mitra</td>
      <td>: Jacob</td>
    </tr>
    <tr>
      <td>Nama Pekerjaan</td>
      <td>: Jacob</td>
    </tr>
    <tr>
      <td>PIC Mitra</td>
      <td>: Jacob</td>
    </tr>
  </tbody>
</table>
</div>


                <div class="row" style="font-family:'GothamRounded-Medium';">
                  <div class="col-6 col-md-4">

                    <div class="card" style="width: 20rem; float: left; background-color: #69fa88; ">
                          <div class="card-body">
                            <form action="{{ url("admin/berkasp0") }}" method="post" enctype="multipart/form-data">
                            <h5 class="card-title" style="font-size: 30pt;">P0</h5>
                            <h6 class="card-subtitle mb-2 " style="margin-top: 20px;">Unggah Dokumen</h6>
                            <input type="hidden" name="id_obl" value="{{data}}">
                            <input style="font-size: 10pt; margin-bottom: 30px;" type="file" name="file">    
                            <h6 class="card-subtitle mb-2 ">Status</h6>
                            <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select>  
                            <input type="hidden" name="1" value="1">
                            <div class="form-group">
                                <label style="margin-top: 20px;" for="exampleFormControlTextarea1" >Keterangan</label>
                                <textarea name = "keterangan_p0" class="form-control" placeholder="Masukkan Keterangan..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                            </div>              
                            <button  style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button>
                          <!--   <h1 style="color: green; font-weight: bold; text-align: center; font-size: 100pt;">✔ </h1> -->
                          </div>
                        </form>
                    </div>

                  </div>



                  <div class="col-6 col-md-4">


                    <div class="card" style="width: 20rem; float: left; background-color: #e69573;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasp1") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">P1</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px;">Unggah Dokumen</h6>
                    <input type="hidden" name="id_obl" value="{{data}}">
                    <input style="font-size: 10pt; margin-bottom: 30px;" type="file" name="file">    
                    <h6 class="card-subtitle mb-2 ">Status</h6>
                    <select name="status_p1" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                      <option value="0"></option>
                      <option value="1">OK</option>
                      <option value="2">Belum OK</option>
                    </select>  
                    <div class="form-group">
                        <label style="margin-top: 20px;" for="exampleFormControlTextarea1" >Keterangan</label>
                        <textarea name = "keterangan_p1" class="form-control" placeholder="Masukkan Keterangan..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>              
                    <button style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </div>
                
                </div>  

                  </div>


                  <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #e69573;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasp6") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">P6</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px;">Unggah Dokumen</h6>
                    <input type="hidden" name="id_obl" value="{{data}}">
                    <input style="font-size: 10pt; margin-bottom: 30px;" type="file" name="file">    
                    <h6 class="card-subtitle mb-2 ">Status</h6>
                    <select name="status_p6" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                      <option value="0"></option>
                      <option value="1">OK</option>
                      <option value="2">Belum OK</option>
                    </select>  
                    <div class="form-group">
                        <label style="margin-top: 20px;" for="exampleFormControlTextarea1" >Keterangan</label>
                        <textarea name= "keterangan_p6" class="form-control" placeholder="Masukkan Keterangan..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>              
                    <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                </div>  
                  </div>
                </div>



            <!-- BARIS KEDUA -->


                <div class="row" style="font-family:'GothamRounded-Medium'; margin-top: 30px; margin-bottom: 30px;">
                  <div class="col-6 col-md-4">

                    <div class="card" style="width: 20rem; float: left; background-color: #e69573;">
                          <div class="card-body">
                            <form action="{{ url("admin/berkasp8") }}" method="post" enctype="multipart/form-data">
                            <h5 class="card-title" style="font-size: 30pt;">P8</h5>
                            <h6 class="card-subtitle mb-2 " style="margin-top: 20px;">Unggah Dokumen</h6>
                            <input style="font-size: 10pt; margin-bottom: 30px;" type="file" name="file">
                            <input type="hidden" name="id_obl" value="{{data}}">    
                            <h6 class="card-subtitle mb-2 ">Status</h6>
                            <select name="status_p8" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select>  
                            <div class="form-group">
                                <label style="margin-top: 20px;" for="exampleFormControlTextarea1" >Keterangan</label>
                                <textarea name="keterangan_p8" class="form-control" placeholder="Masukkan Keterangan..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                            </div>              
                            <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                          </div>
                    </div>

                  </div>



                  <div class="col-6 col-md-4">


                    <div class="card" style="width: 20rem; float: left; background-color: #e69573;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkaskl") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">KL</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px;">Unggah Dokumen</h6>
                    <input style="font-size: 10pt; margin-bottom: 30px;" type="file" name="file">  
                    <input type="hidden" name="id_obl" value="{{data}}">  
                    <h6 class="card-subtitle mb-2 ">Status</h6>
                    <select name="status_kl" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                      <option value="0"></option>
                      <option value="1">OK</option>
                      <option value="2">Belum OK</option>
                    </select>  
                    <div class="form-group">
                        <label style="margin-top: 20px;" for="exampleFormControlTextarea1" >Keterangan</label>
                        <textarea name="keterangan_kl" class="form-control" placeholder="Masukkan Keterangan..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>              
                    <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                  </div>
                </div>  

                  </div>


                  <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #e69573;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasbast") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">BAST Mitra</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px;">Unggah Dokumen</h6>
                    <input style="font-size: 10pt; margin-bottom: 30px;" type="file" name="file">    
                    <input type="hidden" name="id_obl" value="{{data}}">
                    <h6 class="card-subtitle mb-2 ">Status</h6>
                    <select name="status_bast" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                      <option value="0"></option>
                      <option value="1">OK</option>
                      <option value="2">Belum OK</option>
                    </select>  
                    <div class="form-group">
                        <label style="margin-top: 20px;" for="exampleFormControlTextarea1" >Keterangan</label>
                        <textarea name = "keterangan_bast" class="form-control" placeholder="Masukkan Keterangan..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>              
                    <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                  </div>
                </div>  
                  </div>
                </div>

</body>

</html>