<?php 
//验证码编写

class Code{
	private $img_x;
    private $img_y;
    private $img;
	private $outcode;   //服务器用于验证的码
	private $strcode;
    private $write;
	private $black;
	
//初始化
    function __construct(){
     $this->img_x=200;
	 $this->img_y=100;
     $this->img=imagecreate($this->img_x,$this->img_y);
     $this->write=imagecolorallocate($this->img,255,255,255);
	 $this->black=imagecolorallocate($this->img,0,0,0);
	 $this->strcode=$this->creatcode();
	 $this->outcode=implode("",$this->strcode);
		
	}

 
 //开始随机产生干扰
    private function disturb(){
		//产生随机点
       for($i=0;$i<100;$i++){
	        imagesetpixel($this->img,rand($this->img_x,0),rand(0,$this->img_y),$this->black);
        }
		//产生随机线
       for($i=0;$i<10;$i++){
	        imageline($this->img,rand(0,$this->img_x),rand(0,$this->img_y),rand(0,$this->img_x),rand(0,$this->img_y),$this->black);
        }
    }
	
	
 //产生随机验证码
    private function creatcode(){
       for($i=0;$i<4;$i++){
	      $num=rand(1,3);
	      switch($num){
		      case 1:$str[$i]=sprintf('%c',rand(65,90));
		             break;
		      case 2:$str[$i]=sprintf('%c',rand(97,122));
		             break;	
		      case 3 :$str[$i]=rand(0,9);
		             break;	
            }
        }
	  return $str;
    }  
	
	//输出随机验证码
	private function outstring(){
	    for($i=0,$x=20,$y=60;$i<4;$i++,$x+=25){
	    // imagechar($img,5,$x,$y,$str[$i],$black);
	      imagettftext($this->img,50,rand(0,15),$x,$y,$this->black,'C:\Windows\Fonts\courbd.ttf',$this->strcode[$i]);
        }
		//imagechar($this->img,5,20,60,$this->outcode,$this->black,);
	
	}
	
	//输出图像
	 public function outimg(){
		 header("Content-type: image/png");
		 $this->__construct();
		 $this->disturb();
		 $this->outstring();
		 imagepng($this->img);
		 $this->__destruct();
	 }
	 
	 
	 //销毁图像
	  function __destruct(){
		  imagedestroy($this->img);
	 }
	 
	 
     //传递验证码 
      function outcode(){
			return $this->outcode;
	}
	 


}
 
?>
