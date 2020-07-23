<div class="alert alert-info alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fa fa-info"></i> Selamat Datang</h5>
Selamat Datang di Control Panel Sistem Informasi Pelayanan Kependudukan Di Kantor Lurah Kayu Merah
</div>
<script type="text/javascript">
var slideimages=new Array()
function slideshowimages()
{
for (i=0;i<slideshowimages.arguments.length;i++){
slideimages[i]=new Image()
slideimages[i].src=slideshowimages.arguments[i]
}
}
</script>
<div id="img_wel"><img src="../doc/w1.jpeg" alt="Slideshow Image Script" title="Slideshow Image Script" name="slide" class="img_wel"></div>
<script type="text/javascript">
slideshowimages("../doc/w1.jpg", "../doc/w2.jpg", "../doc/w3.jpg", "../doc/w4.jpg")
var slideshowspeed=4000
var whichimage=0
function slideit()
{
if (!document.images)
return
document.images.slide.src=slideimages[whichimage].src
if (whichimage<slideimages.length-1)
whichimage++
else
whichimage=0
setTimeout("slideit()",slideshowspeed)
}
slideit()
</script>
<style>
  #header_msg {
    padding:20px;
    margin-bottom:10px;
    background-color:#DDD;
  }
  
  #img_wel {
    text-align:center;
  }
  
  .img_wel {
    height:400px;
    width: 700px;
    border-radius:15px;
  }
</style>
