
        // 检查是否正在播放
        var isPlaying =false; 
        function play() {
            var player = document.getElementById('music');
            if (isPlaying) {
                // 如果正在播放, 停止播放并停止读取此音乐文件
                player.pause();

                // player.src = '';
            } else {
                // player.src = 'song.ogg';
                player.play();
                
            }
            isPlaying = !isPlaying;//转换播放状态
        }
        //转换播放图标
        var tag=false;
        $('#ic').click(
        	function(){
        		
        		if(!tag)
        		{
        			$('#ic').html("&#xe651");
        		}
        		else
        		{
        			$('#ic').html("&#xe652");
        		}
        		tag =!tag;

        	});
       //启动二维码弹出框
      $(function (){   
    $("#example").popover();  
        });  
    //启动提示框
    $(function () {
     $('[data-toggle="tooltip"]').tooltip()
     })
