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


            <!-- {% if (session.get('admin')['username']) %} -->
            <ul style="margin-left: 10px;" class="list-unstyled">

                <li>
                    <a href="{{ url('admin/form') }}">Form</a>
                </li>
                <li>
                    <a href="{{ url('admin/data') }}">Data</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ session.get('admin')['username'] }}</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ url('admin/register') }}">Daftar</a>
                        </li>
                        <li>
                            <a href="{{ url('user/logout') }}">Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>

           <!--  {% else %} -->

            <ul style="margin-left: 10px;" class="list-unstyled">

                <li>
                    <a href="{{ url('user/datauser') }}">Data</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ session.get('user')['username'] }}</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ url('user/logout') }}">Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- {% endif %} -->




        </nav>



        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="">

                    <button style="margin-right: 30px;" type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <h2 style="font-family:'GothamRounded-Medium'; float: right;">Detail Status Dokumen OBL</h2>
                    <!--  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->



                </div>
            </nav>


<div style="font-family:'GothamRounded-Medium'; margin-bottom: 30px;"  class="table-responsive-sm">
    <table style="width: 30%; font-size: 13pt;">

  <tbody>
    <tr>
      <td>Nama CC</td>
      <td>: {{data.nama_cc}}</td>
    </tr>
    <tr>
      <td>Nama Mitra</td>
      <td>: {{data.nama_mitra}}</td>
    </tr>
    <tr>
      <td>Nama Pekerjaan</td>
      <td>: {{data.nama_pekerjaan}}</td>
    </tr>
    <tr>
      <td>PIC Mitra</td>
      <td>: {{data.pic_mitra}}</td>
    </tr>
  </tbody>
</table>
</div>


                <div class="row" style="font-family:'GothamRounded-Medium';">
                {% if (dokumen_p0) %} 
                  <div class="col-6 col-md-4">

                    <div class="card" style="width: 20rem; float: left; background-color: #69fa88; ">
                          <div class="card-body">
                            <form action="{{ url("admin/berkasp0") }}" method="post" enctype="multipart/form-data">
                            <h5 class="card-title" style="font-size: 30pt;">P0</h5>
                            <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                            {% if (dokumen_p0) %}
                            <a   href="../../admin/downloadp0/{{data.id}}" class="btn btn-primary">Download File P0</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p0 == 1) %}
                            OK
                            {% elseif (data.p0 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                            <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p0) %}
                                {{keterangan_p0.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}       
                            <!-- <button  style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                          <!--   <h1 style="color: green; font-weight: bold; text-align: center; font-size: 100pt;">✔ </h1> -->
                          </div>
                        </form>
                    </div>

                  </div>
                  {% else %}
                  <div class="col-6 col-md-4">

                    <div class="card" style="width: 20rem; float: left; background-color: #d5d9e0; ">
                          <div class="card-body">
                            <form action="{{ url("admin/berkasp0") }}" method="post" enctype="multipart/form-data">
                            <h5 class="card-title" style="font-size: 30pt;">P0</h5>
                            <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                            {% if (dokumen_p0) %}
                            <a   href="../../admin/downloadp0/{{data.id}}" class="btn btn-primary">Download File P0</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p0 == 1) %}
                            OK
                            {% elseif (data.p0 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                            <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p0) %}
                                {{keterangan_p0.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}       
                            <!-- <button  style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                          <!--   <h1 style="color: green; font-weight: bold; text-align: center; font-size: 100pt;">✔ </h1> -->
                          </div>
                        </form>
                    </div>

                  </div>
                  {% endif %}


                  {% if (dokumen_p1) %}
                  <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #69fa88;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasp1") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">P1</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                            {% if (dokumen_p1) %}
                            <a  href="../../admin/downloadp1/{{data.id}}" class="btn btn-primary">Download File P1</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p1 == 1) %}
                            OK
                            {% elseif (data.p1 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p1) %}
                                {{keterangan_p1.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}              
                    <!-- <button style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                    </form>
                  </div>
                
                </div>  

                  </div>
                  {% else %}
                  <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #d5d9e0;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasp1") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">P1</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                            {% if (dokumen_p1) %}
                            <a  href="../../admin/downloadp1/{{data.id}}" class="btn btn-primary">Download File P1</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p1 == 1) %}
                            OK
                            {% elseif (data.p1 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p1) %}
                                {{keterangan_p1.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}              
                    <!-- <button style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                    </form>
                  </div>
                
                </div>  

                  </div>
                  {% endif %}




                  {% if (dokumen_p6) %}
                  <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #69fa88;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasp6") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">P6</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
             
                    {% if (dokumen_p6) %}
                            <a  href="../../admin/downloadp6/{{data.id}}" class="btn btn-primary">Download File P6</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p6 == 1) %}
                            OK
                            {% elseif (data.p6 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                    
                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p6) %}
                                {{keterangan_p6.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}              
                    <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                  </div>
                </form>
                </div>  
                  </div>
                </div>
                {% else %}
                <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #d5d9e0;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasp6") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">P6</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
             
                    {% if (dokumen_p6) %}
                            <a  href="../../admin/downloadp6/{{data.id}}" class="btn btn-primary">Download File P6</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p6 == 1) %}
                            OK
                            {% elseif (data.p6 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                    
                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p6) %}
                                {{keterangan_p6.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}              
                    <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                  </div>
                </form>
                </div>  
                  </div>
                </div>
                {% endif %}



            <!-- BARIS KEDUA -->


                <div class="row" style="font-family:'GothamRounded-Medium'; margin-top: 30px; margin-bottom: 30px;">
                    {% if (dokumen_p8) %}
                  <div class="col-6 col-md-4">

                    <div class="card" style="width: 20rem; float: left; background-color: #69fa88;">
                          <div class="card-body">
                            <form action="{{ url("admin/berkasp8") }}" method="post" enctype="multipart/form-data">
                            <h5 class="card-title" style="font-size: 30pt;">P8</h5>
                            <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                            {% if (dokumen_p8) %}
                            <a  href="../../admin/downloadp8/{{data.id}}" class="btn btn-primary">Download File P8</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p8 == 1) %}
                            OK
                            {% elseif (data.p8 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                            
                            <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p8) %}
                                {{keterangan_p8.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}               
                            <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                          </form>
                          </div>
                    </div>

                  </div>
                  {% else %}
                  <div class="col-6 col-md-4">

                    <div class="card" style="width: 20rem; float: left; background-color: #d5d9e0;">
                          <div class="card-body">
                            <form action="{{ url("admin/berkasp8") }}" method="post" enctype="multipart/form-data">
                            <h5 class="card-title" style="font-size: 30pt;">P8</h5>
                            <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                            {% if (dokumen_p8) %}
                            <a  href="../../admin/downloadp8/{{data.id}}" class="btn btn-primary">Download File P8</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.p8 == 1) %}
                            OK
                            {% elseif (data.p8 == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                            
                            <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_p8) %}
                                {{keterangan_p8.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}               
                            <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                          </form>
                          </div>
                    </div>

                  </div>
                  {% endif %}


                  {% if (dokumen_kl) %}
                  <div class="col-6 col-md-4">


                    <div class="card" style="width: 20rem; float: left; background-color: #69fa88;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkaskl") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">KL</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
          
                   {% if (dokumen_kl) %}
                            <a  href="../../admin/downloadkl/{{data.id}}" class="btn btn-primary">Download File KL</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.kl == 1) %}
                            OK
                            {% elseif (data.kl == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %} 
                    

                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_kl) %}
                                {{keterangan_kl.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}               
                    <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                  </form>
                  </div>
                </div>  

                  </div>
                  {% else %}
                  <div class="col-6 col-md-4">


                    <div class="card" style="width: 20rem; float: left; background-color: #d5d9e0;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkaskl") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">KL</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
          
                   {% if (dokumen_kl) %}
                            <a  href="../../admin/downloadkl/{{data.id}}" class="btn btn-primary">Download File KL</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.kl == 1) %}
                            OK
                            {% elseif (data.kl == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %} 
                    

                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_kl) %}
                                {{keterangan_kl.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}               
                    <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                  </form>
                  </div>
                </div>  

                  </div>
                  {% endif %}


                  {% if (dokumen_bast) %}
                  <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #69fa88;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasbast") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">BAST Mitra</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                    {% if (dokumen_bast) %}
                            <a  href="../../admin/downloadbast/{{data.id}}" class="btn btn-primary">Download File BAST Mitra</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.bast == 1) %}
                            OK
                            {% elseif (data.bast == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                    

                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_bast) %}
                                {{keterangan_bast.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}                
                    <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                  </form>
                  </div>
                </div>  
                  </div>
                  {% else %}
                  <div class="col-6 col-md-4">
                    <div class="card" style="width: 20rem; float: left; background-color: #d5d9e0;">
                  <div class="card-body">
                    <form action="{{ url("admin/berkasbast") }}" method="post" enctype="multipart/form-data">
                    <h5 class="card-title" style="font-size: 30pt;">BAST Mitra</h5>
                    <h6 class="card-subtitle mb-2 " style="margin-top: 20px; font-weight: bold;">Unggah Dokumen</h6>
                    {% if (dokumen_bast) %}
                            <a  href="../../admin/downloadbast/{{data.id}}" class="btn btn-primary">Download File BAST Mitra</a> 
                            {% else %}
                            File belum diunggah
                            {% endif %}
                             
                            <h6 class="card-subtitle mb-2 "style="font-weight: bold; margin-top: 30px;">Status</h6>
                            <!-- <select name="status_p0" class="form-control form-control-sm" style="width: 100%; font-size: 15pt; margin-top: 0px;" >
                              <option value="0"></option>
                              <option value="1">OK</option>
                              <option value="2">Belum OK</option>
                            </select> -->  

                            {% if (data.bast == 1) %}
                            OK
                            {% elseif (data.bast == 2) %}
                            Belum OK
                            {% else %}
                            BELUM TERISI
                            {% endif %}
                    

                    <h6 class="card-subtitle mb-2 " style="font-weight: bold; margin-top: 20px;">Keterangan</h6>    
                                {% if (keterangan_bast) %}
                                {{keterangan_bast.keterangan}}
                                {% else %}
                                Belum ada keterangan
                                {% endif %}                
                    <!-- <button value = "" style="margin-top: 0px; margin-bottom: 0px; color: white;" type="submit" class="btn btn-primary">Simpan</button> -->
                  </form>
                  </div>
                </div>  
                  </div>
                  {% endif %}
                </div>

</body>

</html>