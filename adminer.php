<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.8.1
*/function
adminer_errors($Ac,$Cc){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$Cc);}error_reporting(6135);set_error_handler('adminer_errors',E_WARNING);$Yc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Yc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Fi=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Fi)$$X=$Fi;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($v){if(!preg_match('~^[`\'"]~',$v))return$v;$ne=substr($v,-1);return
str_replace($ne.$ne,$ne,substr($v,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($qg,$Yc=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($z,$X)=each($qg)){foreach($X
as$fe=>$W){unset($qg[$z][$fe]);if(is_array($W)){$qg[$z][stripslashes($fe)]=$W;$qg[]=&$qg[$z][stripslashes($fe)];}else$qg[$z][stripslashes($fe)]=($Yc?$W:stripslashes($W));}}}}function
bracket_escape($v,$Ma=false){static$ri=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($v,($Ma?array_flip($ri):$ri));}function
min_version($Wi,$Ae="",$h=null){global$g;if(!$h)$h=$g;$kh=$h->server_info;if($Ae&&preg_match('~([\d.]+)-MariaDB~',$kh,$C)){$kh=$C[1];$Wi=$Ae;}return(version_compare($kh,$Wi)>=0);}function
charset($g){return(min_version("5.5.3",0,$g)?"utf8mb4":"utf8");}function
script($vh,$qi="\n"){return"<script".nonce().">$vh</script>$qi";}function
script_src($Ki){return"<script src='".h($Ki)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($D,$Y,$cb,$ke="",$rf="",$gb="",$le=""){$I="<input type='checkbox' name='$D' value='".h($Y)."'".($cb?" checked":"").($le?" aria-labelledby='$le'":"").">".($rf?script("qsl('input').onclick = function () { $rf };",""):"");return($ke!=""||$gb?"<label".($gb?" class='$gb'":"").">$I".h($ke)."</label>":$I);}function
optionlist($xf,$dh=null,$Oi=false){$I="";foreach($xf
as$fe=>$W){$yf=array($fe=>$W);if(is_array($W)){$I.='<optgroup label="'.h($fe).'">';$yf=$W;}foreach($yf
as$z=>$X)$I.='<option'.($Oi||is_string($z)?' value="'.h($z).'"':'').(($Oi||is_string($z)?(string)$z:$X)===$dh?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($D,$xf,$Y="",$qf=true,$le=""){if($qf)return"<select name='".h($D)."'".($le?" aria-labelledby='$le'":"").">".optionlist($xf,$Y)."</select>".(is_string($qf)?script("qsl('select').onchange = function () { $qf };",""):"");$I="";foreach($xf
as$z=>$X)$I.="<label><input type='radio' name='".h($D)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ha,$xf,$Y="",$qf="",$cg=""){$Vh=($xf?"select":"input");return"<$Vh$Ha".($xf?"><option value=''>$cg".optionlist($xf,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$cg'>").($qf?script("qsl('$Vh').onchange = $qf;",""):"");}function
confirm($Ke="",$eh="qsl('input')"){return
script("$eh.onclick = function () { return confirm('".($Ke?js_escape($Ke):'Are you sure?')."'); };","");}function
print_fieldset($u,$se,$Zi=false){echo"<fieldset><legend>","<a href='#fieldset-$u'>$se</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$u');",""),"</legend>","<div id='fieldset-$u'".($Zi?"":" class='hidden'").">\n";}function
bold($Ta,$gb=""){return($Ta?" class='active $gb'":($gb?" class='$gb'":""));}function
odd($I=' class="odd"'){static$t=0;if(!$I)$t=-1;return($t++%2?$I:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($z,$X=null){static$Zc=true;if($Zc)echo"{";if($z!=""){echo($Zc?"":",")."\n\t\"".addcslashes($z,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$Zc=false;}else{echo"\n}\n";$Zc=true;}}function
ini_bool($Sd){$X=ini_get($Sd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Vi,$M,$V,$F){$_SESSION["pwds"][$Vi][$M][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($P){global$g;return$g->quote($P);}function
get_vals($G,$e=0){global$g;$I=array();$H=$g->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$e];}return$I;}function
get_key_vals($G,$h=null,$nh=true){global$g;if(!is_object($h))$h=$g;$I=array();$H=$h->query($G);if(is_object($H)){while($J=$H->fetch_row()){if($nh)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$h=null,$n="<p class='error'>"){global$g;$wb=(is_object($h)?$h:$g);$I=array();$H=$wb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$I;}function
unique_array($J,$x){foreach($x
as$w){if(preg_match("~PRIMARY|UNIQUE~",$w["type"])){$I=array();foreach($w["columns"]as$z){if(!isset($J[$z]))continue
2;$I[$z]=$J[$z];}return$I;}}}function
escape_key($z){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$z,$C))return$C[1].idf_escape(idf_unescape($C[2])).$C[3];return
idf_escape($z);}function
where($Z,$p=array()){global$g,$y;$I=array();foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$e=escape_key($z);$I[]=$e.($y=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($y=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$z],q($X))));if($y=="sql"&&preg_match('~char|text~',$p[$z]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$e = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$z)$I[]=escape_key($z)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$p=array()){parse_str($X,$ab);remove_slashes(array(&$ab));return
where($ab,$p);}function
where_link($t,$e,$Y,$tf="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($e)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$tf:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$L=array()){$I="";foreach($f
as$z=>$X){if($L&&!in_array(idf_escape($z),$L))continue;$Fa=convert_field($p[$z]);if($Fa)$I.=", $Fa AS ".idf_escape($z);}return$I;}function
cookie($D,$Y,$ve=2592000){global$ba;return
header("Set-Cookie: $D=".urlencode($Y).($ve?"; expires=".gmdate("D, d M Y H:i:s",time()+$ve)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($ed=false){$Ni=ini_bool("session.use_cookies");if(!$Ni||$ed){session_write_close();if($Ni&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Vi,$M,$V,$l=null){global$ic;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($ic))."|username|".($l!==null?"db|":"").session_name()),$C);return"$C[1]?".(sid()?SID."&":"").($Vi!="server"||$M!=""?urlencode($Vi)."=".urlencode($M)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($C[2]?"&$C[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($B,$Ke=null){if($Ke!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($B!==null?$B:$_SERVER["REQUEST_URI"]))][]=$Ke;}if($B!==null){if($B=="")$B=".";header("Location: $B");exit;}}function
query_redirect($G,$B,$Ke,$Ag=true,$Hc=true,$Rc=false,$di=""){global$g,$n,$b;if($Hc){$Ch=microtime(true);$Rc=!$g->query($G);$di=format_time($Ch);}$yh="";if($G)$yh=$b->messageQuery($G,$di,$Rc);if($Rc){$n=error().$yh.script("messagesPrint();");return
false;}if($Ag)redirect($B,$Ke.$yh);return
true;}function
queries($G){global$g;static$vg=array();static$Ch;if(!$Ch)$Ch=microtime(true);if($G===null)return
array(implode("\n",$vg),format_time($Ch));$vg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$g->query($G);}function
apply_queries($G,$S,$Dc='table'){foreach($S
as$Q){if(!queries("$G ".$Dc($Q)))return
false;}return
true;}function
queries_redirect($B,$Ke,$Ag){list($vg,$di)=queries(null);return
query_redirect($vg,$B,$Ke,$Ag,false,!$Ag,$di);}function
format_time($Ch){return
sprintf('%.3f s',max(0,microtime(true)-$Ch));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($Nf=""){return
substr(preg_replace("~(?<=[?&])($Nf".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($E,$Nb){return" ".($E==$Nb?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($z,$Vb=false){$Xc=$_FILES[$z];if(!$Xc)return
null;foreach($Xc
as$z=>$X)$Xc[$z]=(array)$X;$I='';foreach($Xc["error"]as$z=>$n){if($n)return$n;$D=$Xc["name"][$z];$li=$Xc["tmp_name"][$z];$Bb=file_get_contents($Vb&&preg_match('~\.gz$~',$D)?"compress.zlib://$li":$li);if($Vb){$Ch=substr($Bb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Ch,$Gg))$Bb=iconv("utf-16","utf-8",$Bb);elseif($Ch=="\xEF\xBB\xBF")$Bb=substr($Bb,3);$I.=$Bb."\n\n";}else$I.=$Bb;}return$I;}function
upload_error($n){$He=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'Unable to upload a file.'.($He?" ".sprintf('Maximum allowed file size is %sB.',$He):""):'File does not exist.');}function
repeat_pattern($Zf,$te){return
str_repeat("$Zf{0,65535}",$te/65535)."$Zf{0,".($te%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$te=80,$Jh=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$te).")($)?)u",$P,$C))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$te).")($)?)",$P,$C);return
h($C[1]).$Jh.(isset($C[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($qg,$Hd=array(),$ig=''){$I=false;foreach($qg
as$z=>$X){if(!in_array($z,$Hd)){if(is_array($X))hidden_fields($X,array(),$z);else{$I=true;echo'<input type="hidden" name="'.h($ig?$ig."[$z]":$z).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Sc=false){$I=table_status($Q,$Sc);return($I?$I:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$I=array();foreach($b->foreignKeys($Q)as$r){foreach($r["source"]as$X)$I[$X][]=$r;}return$I;}function
enum_input($T,$Ha,$o,$Y,$xc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Ce);$I=($xc!==null?"<label><input type='$T'$Ha value='$xc'".((is_array($Y)?in_array($xc,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Ce[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$cb=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$I.=" <label><input type='$T'$Ha value='".($t+1)."'".($cb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$I;}function
input($o,$Y,$s){global$U,$b,$y;$D=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$s){$Da=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Da[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Da);$s="json";}$Kg=($y=="mssql"&&$o["auto_increment"]);if($Kg&&!$_POST["save"])$s=null;$nd=(isset($_GET["select"])||$Kg?array("orig"=>'original'):array())+$b->editFunctions($o);$Ha=" name='fields[$D]'";if($o["type"]=="enum")echo
h($nd[""])."<td>".$b->editInput($_GET["edit"],$o,$Ha,$Y);else{$xd=(in_array($s,$nd)||isset($nd[$s]));echo(count($nd)>1?"<select name='function[$D]'>".optionlist($nd,$s===null||$xd?$s:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($nd))).'<td>';$Ud=$b->editInput($_GET["edit"],$o,$Ha,$Y);if($Ud!="")echo$Ud;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ha value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ha value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Ce);foreach($Ce[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$cb=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$D][$t]' value='".(1<<$t)."'".($cb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'>";elseif(($bi=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($bi&&$y!="sqlite")$Ha.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ha.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ha>".h($Y).'</textarea>';}elseif($s=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ha cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Je=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$C)?((preg_match("~binary~",$o["type"])?2:1)*$C[1]+($C[3]?1:0)+($C[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($y=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Je+=7;echo"<input".((!$xd||$s==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Je?" data-maxlength='$Je'":"").(preg_match('~char|binary~',$o["type"])&&$Je>20?" size='40'":"")."$Ha>";}echo$b->editHint($_GET["edit"],$o,$Y);$Zc=0;foreach($nd
as$z=>$X){if($z===""||!$X)break;$Zc++;}if($Zc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Zc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$v=bracket_escape($o["field"]);$s=$_POST["function"][$v];$Y=$_POST["fields"][$v];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($s=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($s=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($s=="json"){$s="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Xc=get_file("fields-$v");if(!is_string($Xc))return
false;return$m->quoteBinary($Xc);}return$b->processInput($o,$Y,$s);}function
fields_from_edit(){global$m;$I=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$D=bracket_escape($z,1);$I[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$m->primary),);}return$I;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$gh="<ul>\n";foreach(table_status('',true)as$Q=>$R){$D=$b->tableName($R);if(isset($R["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$H=$g->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$H||$H->fetch_row()){$mg="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>";echo"$gh<li>".($H?$mg:"<p class='error'>$mg: ".error())."\n";$gh="";}}}echo($gh?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Fd,$Se=false){global$b;$I=$b->dumpHeaders($Fd,$Se);$Jf=$_POST["output"];if($Jf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Fd).".$I".($Jf!="file"&&preg_match('~^[0-9a-z]+$~',$Jf)?".$Jf":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$z=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$J[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($s,$e){return($s?($s=="unixepoch"?"DATETIME($e, '$s')":($s=="count distinct"?"COUNT(DISTINCT ":strtoupper("$s("))."$e)"):$e);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$I=dirname($q);unlink($q);}}return$I;}function
file_open_lock($q){$ld=@fopen($q,"r+");if(!$ld){$ld=@fopen($q,"w");if(!$ld)return;chmod($q,0660);}flock($ld,LOCK_EX);return$ld;}function
file_write_unlock($ld,$Pb){rewind($ld);fwrite($ld,$Pb);ftruncate($ld,strlen($Pb));flock($ld,LOCK_UN);fclose($ld);}function
password_file($i){$q=get_temp_dir()."/adminer.key";$I=@file_get_contents($q);if($I||!$i)return$I;$ld=@fopen($q,"w");if($ld){chmod($q,0660);$I=rand_string();fwrite($ld,$I);fclose($ld);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$o,$ci){global$b;if(is_array($X)){$I="";foreach($X
as$fe=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($fe):"")."<td>".select_value($W,$A,$o,$ci);return"<table cellspacing='0'>$I</table>";}if(!$A)$A=$b->selectLink($X,$o);if($A===null){if(is_mail($X))$A="mailto:$X";if(is_url($X))$A=$X;}$I=$b->editVal($X,$o);if($I!==null){if(!is_utf8($I))$I="\0";elseif($ci!=""&&is_shortable($o))$I=shorten_utf8($I,max(0,+$ci));else$I=h($I);}return$b->selectVal($I,$A,$o,$X);}function
is_mail($uc){$Ga='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$hc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Zf="$Ga+(\\.$Ga+)*@($hc?\\.)+$hc";return
is_string($uc)&&preg_match("(^$Zf(,\\s*$Zf)*\$)i",$uc);}function
is_url($P){$hc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($hc?\\.)+$hc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$ae,$qd){global$y;$G=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($ae&&($y=="sql"||count($qd)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$qd).")$G":"SELECT COUNT(*)".($ae?" FROM (SELECT 1$G GROUP BY ".implode(", ",$qd).") x":$G));}function
slow_query($G){global$b,$ni,$m;$l=$b->database();$ei=$b->queryTimeout();$sh=$m->slowQuery($G,$ei);if(!$sh&&support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$ie=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$ie,'&token=',$ni,'\');
}, ',1000*$ei,');
</script>
';}else$h=null;ob_flush();flush();$I=@get_key_vals(($sh?$sh:$G),$h,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$yg=rand(1,1e6);return($yg^$_SESSION["token"]).":$yg";}function
verify_token(){list($ni,$yg)=explode(":",$_POST["token"]);return($yg^$_SESSION["token"])==$ni;}function
lzw_decompress($Qa){$ec=256;$Ra=8;$ib=array();$Mg=0;$Ng=0;for($t=0;$t<strlen($Qa);$t++){$Mg=($Mg<<8)+ord($Qa[$t]);$Ng+=8;if($Ng>=$Ra){$Ng-=$Ra;$ib[]=$Mg>>$Ng;$Mg&=(1<<$Ng)-1;$ec++;if($ec>>$Ra)$Ra++;}}$dc=range("\0","\xFF");$I="";foreach($ib
as$t=>$hb){$tc=$dc[$hb];if(!isset($tc))$tc=$kj.$kj[0];$I.=$tc;if($t)$dc[]=$kj.$tc[0];$kj=$tc;}return$I;}function
on_help($pb,$ph=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $pb, $ph) }, onmouseout: helpMouseout});","");}function
edit_form($Q,$p,$J,$Ii){global$b,$y,$ni,$n;$Oh=$b->tableName(table_status1($Q,true));page_header(($Ii?'Edit':'Insert'),$n,array("select"=>array($Q,$Oh)),$Oh);$b->editRowPrint($Q,$p,$J,$Ii);if($J===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$D=>$o){echo"<tr><th>".$b->fieldName($o);$Wb=$_GET["set"][bracket_escape($D)];if($Wb===null){$Wb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Wb,$Gg))$Wb=$Gg[1];}$Y=($J!==null?($J[$D]!=""&&$y=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($J[$D])?array_sum($J[$D]):+$J[$D]):(is_bool($J[$D])?+$J[$D]:$J[$D])):(!$Ii&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Wb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$s=($_POST["save"]?(string)$_POST["function"][$D]:($Ii&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(!$_POST&&!$Ii&&$Y==$o["default"]&&preg_match('~^[\w.]+\(~',$Y))$s="SQL";if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$s="now";}input($o,$Y,$s);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Ii?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Ii?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."…', this); };"):"");}}echo($Ii?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$ni,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0\0\n @\0´C蔜"\0`E㑸?ÀtvM'JdÁd\\b0\0Ĝ"Àfӈ¤ϧсXPaJ0¥8#RT©z`#.©ǣ혃þȀ?À-\0¡Im? .«M¶\0ȯ(̉ýÀ/(%\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇ٌެ7B14vb0ͦs¼ꮲB̑±٘ޮ:#(¼b.\rDc)Ȉa7E¤¬¦ñ話̎s´筴fӉȎi7³¹¤ȴ4¦ӹ蚦4°iAT«VV馺Ϧ,:1¦Qݼ񢲙`ǣþ>:7Gјҳ°LXD*bv<܌#£e@ֺ4秡fo·ƴ:<¥ܥ¾o✎\niÅ𧬩»a_¤:¹iÁBvø|Nû4.5Nfi¢vpШ¸°l¨ꡖ܏¦£OFQЄk\$¥өõÀ¤2T㡰ʶþ¡-ؚ ޶½£𐎨:¬a̬£됮2#8А±#6n⮑񊞈¢h«t±䴆O42��ޒ¾*r ©@p@!Ĝ¾σ��6Àr[ퟱ�Áퟯ�Bj§!Hb󃐤=!1V\"²0¿\nSƙƏD7ìDڛÏC!!ইʌ§ ȫ=tC橮C¤À:+Ȋ=ªªº²¡±奟ªc�R/EȒ4© 2°䱠㠂8(ᓹ[W䑜=ySb°=ܹ֭BS+ɯȜý¥ø@pL4Yd㗄qø㦰ꢶ£3Ĭ¯¸Ac܌莨k[&>ö¨ZÁpkm]u-c:ؕ¸Nt摎´pҝ8轿#ᛏ.𜞯~ m˹PPἉ֛ùÀ쇑ª9v[Q\nٲ��+ᔑ2­VÁõz䴍£8÷(	¾Ey*#j¬2]­Rҁ¥)À[N­R\$<>:󭾜$;> ̜r»Έ̓TȜnw¡N 巘£¦켯ˇwබ¹\\Y󟠒t^>\r}ٓ\rz鴽µ\nL%J㓋\",Z 8¸i÷0u©?¨ûѴ¡s3#¨ى :󦻍㽖ȞE]xݒs^8£K^ɷ*0ўwޔȞ~㶺푩ؾv2w½ÿ±û^7㈲7£cݑu+U%{Pܪ4̼錘./!¼1Cşqx!H¹ㆤù­L¨¤¨ĠϠ6댨5®f¸Ć¨=Høl V1\0a2׻Զ඾_هĞ\0&�� d)KE'nµ[X©³\0ZɊԆ[Pޘ@ߡ񙂬`ɕ\"ڷ°Ee9yF>˔9bº憵:ü\0}Ĵ(\$ӈ뀳7Hö£蠌M¾A°²6Rú{MqݷG ڙCCꭲ¢(Ct>[쭴À/&C]ꥴG􌬜4@r>ǂ弚Sq/应Q덨mÀІ��LÀܣ贋˼®6fKPݜr%tԈӖ=\" SH\$} ¸)w¡,W\0F³ªu@آ¦9\rr°2ã¬DX³ڹOIù>»nǢ%㹐'ݟÁt\rτzĜ\1hl¼]Q5Mp6kЄqhÜ$£H~͂|Ҕݡ*4񜐲۠S뽲S t퐐\\g±跇\n-:袪p´lB¦Өc(wO0\\:зÁp4򻔚újO¤6HÊ¶rՒ¥q\n¦ɥ%¶y']\$aZӮfcձ*-ꆗºúkz°µj°lgጺ\$\"ގ¼\r#ɤ⃂¿гcᬌ \"jª\rÀ¶¦Ւ¼Ph1/DA) ²ݛÀknÁp76ÁY´R{ፅ¤Pû°򀜮-¸a·6þߛ»zJH,dl B£ho³쟂򝬫#Dr^µ^µ٥¼E½½ ĜaP��£z౴񠲇Xٖ¢´Á¿V¶ןޙȳт_%K=E©¸b弾߂§kU(.!ܮ8¸üɌI.@K͸nþ¬ü:Ð󎳇2«m툉	C*캶┅\nR¹µ0u­朮ҧ]Λ¯P/µJQd¥{L޳:YÁ2b¼T 񝊳Ӵ䣪¥V=¿L4ΐrġ߂𙳶͙­MeLªܝ眶ùiÀoй< G¤ƕЙMhm^¯UێÀ·򔲋5HiM/¬n흳T [-<__Xr(<¯®ɴ̌uҖGNX20圲\$^:'9趏턻׫¼µf N'a¶ǎ­bŬ˖¤􅫱µ!%6@úϜ$҅Gڜ¬1(mUª兲ս堡ЩN+Ü񩚜䰬ؒf0Æ½[U⸖ʨ-:I^ \$س«b\reugɨª~9۟bµ􂈦䫰¬ԠhXrݬ©!\$e,±w+÷댳̟⁅kù\nkòõʛcuWdYÿ\\׽{.󄍘¢g»p8t\rRZ¿vJ:²>þ£Y|+ŀÀۃCt\rjt½6²𞋥¿ഇ񒞾ù/¥͇ퟻ�`ו䲶~K¤ᶑRЗ𺑌ꬭªwLǹY*q¬xĺ񨓥®ݛ³跣~D͡÷x¾뉟i72ĸяݻû_{񺵳⺴_õzԳùd)C¯$?KӪP%ϏT&þ&\0P׎A^­~¢ pƅ öϜԵ\r\$ޯЖ좪+D6궦ψޭJ\$(ȯlލh&싂S>¸ö;z¶¦xůz>휚oĚ𜮊[϶õ˂Ȝµ°2õOxِVø0fûú¯޲BlɢkжZkµhXcd갪T⯈=­πp0lV鵋袜r¼¥nm¦難(��ⲅܺC¨Cڋ⌜r¨G\ré0÷i暌°þ:`Z1Q\n:ܲ\0˧Ȍq±°ü:`¿-ȍ#}1;边q#|񓑀¾¢hlDĆ\0fiDp뎌 ``°琑0yߒ1Ꜳ񽐑MQ\\¤³%oq­\0؋񣒱¨21¬1°­ ¿±§ќbi:큜r±/Ѣ `)İù@¾±É1«NØʵ񏑱¢Z񣘱±1 򝕑üଥ\rdIǦv䪭1 tڂø°⁒0:0𰓱 A2V񢰠雱%²fi3!&Q·Rc%ұ&w%Ѭ\rֈ#ʸQw`% ¾ҭ*rҹ&i߫r{*²»(rg(±#(2­(𥩒@i-  1\"\0ۚ²R꿮e.r뚄,¡ry(2ªCਲb졂ޏ3%ҵ,R¿1²Ʀ辴䢨a\rL³-3ᓠ֌ 󔜰拳Bp1񹴳O'R°3*²³=\$ۓ£^iI;/3i©5ҋ&}17²# ѹ8 ¿\"߷ѥ8񹪒23!󏡱\\\0ϸ­rk9±;S23¶ړ*Ӻq]5S<³Á#383ݓ#eѽ¹>~9S螳rթT*a@і٢esٛԕ£:-󀏩Ǟ*;, ؙ3!i´LҲퟲ� +nÀ «*²〳3i7´1©´_FS;3φ±\rA¯钳õ>´x: \r³0Δ@-ԯ¬ӷӛ7񄓓J3 箆霤O¤B±%4©+tçg󌱜rJtJ􋍲\r􍷱ƆT@£¾)ⓣdɲP>ΰFi಴þ\nr\0¸b癫(´D¶¿㋑¤´㚱㜢2t��蜲À,\$KCt򵴶#��ᐣPi.Ε2µC澞\"䢩;}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:gCI¼ܜn8Ň3)°˃781Њx:\nOg#)Ъr7\n\"贠ø|2̧SiH)N¦S䧜r\"0¹Ā䩝`(\$s6O!ӨV/=' T4潄iS6IO G#ҁX·VCƳ¡ Z1.Шp8,³[¦H䵋~Cz§ɥ2¹l¾c3ͩs£ىbⴜn醸TƚIݚ©U*fz¹䲰EƓÀع¸񦎙.:攃Iʨأ·ᅎ!_lힷ^(¶N{S)r˱ÁYl٦33ڜn+G¥Ӫyº톋i¶®xV3w³uh㞲؀º´a۔ú¹cب\r¨먮ºChҼ\r)董¡`淣�3'm5£ȕ\nPܺ2£P»ªq 򿅃}īúʁ곸BذhRȲ(0¥¡b\\0Hr44ÁB!¡pǜ$rZZ˲܉.Ƀ(\\5Ë|\nC(Μ"P𸮋Ў̒TʕΓÀ澄HN8HP᜜¬7Jp~ܻ2%¡ЏC¨1㮃§C8·HȲ*j°᜷S(¹/¡쬶KUʞ¡<2pOI��ԤⳈdOH ޵-üƴ㰘25-Ң򛈰z7£¸\"(°P \\32:]Uڗ譢߅!]¸<·AۆۤПiڰl\rԜ0v²ΣJ8«Ϸm펉¤¨<ɠ漥m;p#㠘Dø÷iZøN0ȹø¨占Á蠓wJD¿¾2ҹt¢*øι싎iIh\\9ƕ萺杅ḯ­µyl*ȈΗ晠ܗø긒W³⿵ޛ3ٰʡ\"6囮[¬ʗ\r­*\$¶Ƨ¾nzxƹ\r켪3ףpޓﻶ:(p\\;ԋmz¢ü§9󜐑ü8NÁj2½«ΜrɈH&²(úÁ7i۫£ ¤c¤e򞽧t̌2:SH󈠃/)xހ饴ri9¥½õ뜸π˯yҷ½°Vī^Wڦ­¬kZ晗l·ʣ4ֈƋª¶À¬𜜅Ȼ0¹pDi-T澚û0l°%=Á Ж˃9(5𜮙\nn,4\0菡}܃.°öRs\02B\\ۢ1S±\0003,ԘPHJsp夓K CA!°2*WԱڲ\$䫙¦^\n1´򺅃 Iv¤\\䜲ɛ .*A°E(d±ᰃb꜂܄ƹ Dh&­ª?ĝH°sQ2x~nÁJT2ù&㠥R½GґTwꝑ»õP⣜\ )6¦��򳅨\\3¨\0R	À'\r+*;Rퟢ�!ћͧ~­%t< 簜K#桚񬟌ퟰ�³٬Ā®&ᜤ	Á½`CXӆ0֭弻³ĺM騉皜G䑡&3 D<!萲3ÿh¤J©e ڰhᑜr¡mퟹ�¸£´ʎ؈l7¡®vꗉ宋´Á-ӵ֧ey\rEJ\ni*¼\$@ڒU0,\$U¿E¦Ԕªu)@(tΙSJkᰡ~­ए`̾¯\nû#\rp9jɹܝ&Nc(rTQUª½S·ځ\08n`«yb¤ŖL܏5򞑾x⁢±f䴒☚+\"щ{kMț\r%ƌ[	¤e􎡔1! 迭³Ԯ©F@«b)R£72\nW¨±L²ܜҮtdի휜0wglø0n@򪉢թ퍫\nA§M5n윤E³ױNۡl©ݒז쥪1 Aܻºú÷ݫ񲮩FB÷Ϲol,muNx-͟ ֤C( f遬\r1p[9x(i´BҖ²ۺQlüº8Cԉ´©XU Tb£݉ݠp+V\0;Cb΀X񫏒s＝H÷қ᫋x¬G*􆏝·awnú!Ŷ򢛐mS�IލK˾/ӥ7޹eeNɲªS«/;d偆>}l~Ϫ ¨%^´f瘢pڜDE·t\nx=ëЎ*dºꄰTºüûj2ɪ\n ɠ,e=M84��aj@sԤnf©ݜn\rd¼0ޭ��%ԓ혞~	Ҩ<֐ˋAH¿G8񙿝΃\$z«𻶻²u2*ࡏÀ>»(wK.bP{oý´«zµ#낲ö8=ɋ8>ª¤³A,°e°À+샨§xõ*áҭb=m,aìzkWõ,mJi抧᷁+轰°[¯ÿ.RʳKùǛ䘧ݚZL˧2`̜(vZ¡ܝÀ¶蜤׹,儿H±֖NxX��¨\$󬍍*\nѣ\$<qÿşh!¿¹S⃀xsA!:´K¥Á}Á²ù¬£RþA2k·Xp\n<÷þ¦ý묬§ٳ¯ø¦țVV¬}£g&Yݍ!+󻼸YǳYE3r³َ񆛃�¦Ź¢ճϫkþø°֛£«ϗt÷Uø­)û[ý߁ص´«l確Dø+Ϗ _o㌤h140֡ʰø¯b䋘㬒 öþ鄻lGª#ª©ꎅ¦©켕d涉K«ꂷެค@º®O\0HŚퟢ�6\rۂ©ܜ\cg\0ö㫲BĪeМn	zr!nWz& {H𧜤X  w@Ҹ뎄Gr*넝H姰#Į¦Ԝndü÷,􏥗,ü;g~¯\0У̅²E\r։`𒥅Ү ]`ʌЛ%&Юm°ý\r➅%4Sv𣜮 fH\$%됌-£­ƑqB⭦ À-􎣲§&Àّ̝ 腱h\r񬝠®s ЇѨ䋷±n#±ڭઅ¯Fr礬&dÀؙ庬F6¸Á\" |¿§¢s@ߚ±®庌)0rpڏ\0X\0¤٨|DL<!°��D¶{.B<Eª0nB(|\r\n잩͠h³!֪r\$§(^ª~螂/pq²̂¨ŏ𺬜\µ¨#RRΎ%뤍dЈjċ` 􋮌­ V哅 bSd§iEøﯨ´r<i/k\$-\$o¼+ƅκlҞO³&evƒ¼iҪMPA'u'Ό( M(h/+«򗄾So·.n·.𮔸쪨(\"­À§hö&p¨/˯1D̊窥¨¸E螦⦀,'l\$/.,Ĥ¨WbbO3󂳳H :J`!.ªÀû¥ ,FÀѷ(Ȕ¿³û1l峠֒²Ţq¢X\rÀ®~R鰱`®Ҟ󮙪互¨ùrJ´·%Lϫn¸\"ø\r¦΍H!qb¾2〈±%ӞΓ¨Wj#9ӔObE.I:6Á7\0˶+¤%°.Ȓޅ³a7E8VS忇(DG¨ӳB륻򬹔/<´ú¥À\r 쇴>ûMÀ°@¶¾H DsЋ°Z[tH£Enx(ퟲ� x񏻀¯þGkjW>̂ڣT/8®c8鑰˨_ԉIGII!¥ퟨ�Ed˅´^td鴨 DV!C渎¥\r­´b3©!3↎@ٳ3N}⚂󳐉ϳ俳0ڜM(꾂ʽ䜜Ѵꂦ fˢI\r®󳳷 XԜ"tdά\nbtNO`P⻔­ܕҭÀԎ¯\$\nߤZѭ5U5WUµ^hoýঈtِM/5K4Ej³KQ&53GXXx)Ҽ5D\rûV��r¢5b܀\\J\">§豓\r[-¦ʄuÀ\rҢ§é00󙵈ˢ·k{\nµģµޜr³^·|赜»U埮ɕ~YtӜrIÀ䏳R 󎳺ҵePMS谔µwW¯XȲ򄨲¤KOUܠ;Uõ\n OY降Q,M[\0÷_ªD͈W ¾J*윲g(]ਜr\"ZC©6uꏫµY󎈓Y6ô0ªqõ(ٳ8}󕳁X3T h9j¶jইõMt吊bqMP5>ퟣ�©Yk%&\\1d¢؅4À µYnʌ휤<¥U]Ӊ1mbֶ^ҵ ꒅ\"NV韰¶밵±eMڞכW霢䩑\n ˜nf7\nׅ2´õr8=Ek7tVµ7P¦¶Lɭa6򕔲v@'6i௪&>±☻­㠒ÿa	\0pڨ(µJѫ)«\\¿ªnû򄬒m\0¼¨2��qJö­P��±fjü"[\0¨·¢X,<\\⌷淫md徇⌠ѳ%o°´mnש,ׄ攇²\r4¶¸\r±Ό¸׭EH]¦üֈW­M0D徏ˁKø¸´༦؞ܗ\r>ԭz]2sxDd[stS¢¶\0Qf-K`­¢t؎wT¯9暀ɸ\nB£9 Nb㼚BþI5oׯJ񰀏JNd勜rhލÖ2\"ฦHCݍ:øý9Yn16ƴzr+z±ùþ\\÷��±T ö򠷀Y2lQ<2O+¥%ͮӃhù0Aޱ¸Ú2R¦À1£/¯hH\r¨XȡNB&§ č@֛xʮ¥ꖢ8&Lږ͜vై*j¤ۚGH刜\ٮ	²¶&sۓ\0Q \\\"袠°	ĜrBsɷ	١BN`7§Co(كਜnè¨19̪E 񓅓U0Uº t'|m°޿h[¢\$.#ɵ	 剰โ��ꄀ|§{Àʐ\0x��w¢%¤EsBd¿§CU~O׷Ѕ❄ԃ¨Z3¨¥1¦¥{©eLY¡ڐ¢\\(*R` 	জnΈº̑CFȪ¹¹ੜ¬ڰX|`N¨¾\$[@͕¢అ¦¶ڥ`Zd\"\\\"¢£)«I:贚쯄拜0[²¨ű-© g�®*`hu%£,¬㉵7ī²H󵂭¤6޽®ºN֍³\$»MµUYf&1ùÀe]pz¥§ډ¤ŭ¶G/£ ºw ܡ\\#5¥4I¥d¹E¨q妄÷Ѭk縼ګ¥qDbz?§º>ú¾:[茒ƬZ°X®:¹·ښǪ߷5	¶Y¾0 ©­¯\$\0C¢dSg¸됂 {@\n`	ÀüC ¢·»Mºµ⌻²# t}xΎ÷º{º۰)껃ʆKZޏj0PFYB䰆k0<ھʄ<JEg\rõ.2ü8镀*εfkª̙JD숉4TDU76ɯ´诀·K+×öJ®ºÂ퀓=ܗIOD³85MNº\$R􏜰ø5¨\r๟𪏜셜񏉫ϳN笣ҥy\\��qUБû ª\n@¨ۺð¬¨P۱«7ԽN\rýR{*qmݜ$\0RהťqЌÈ+U@ނ¤煏f*CˬºMC䠟 腼򽋵Nꦔⵙ¦C׻© ¸ܜWÅe&_X_؍h嗂Ƃ3ÀۥܟFW£û|Gޛ'ś¯łÀ°ٕV У^\r猦GR¾P±݆g¢ûYi û¥Ǻ\n⨞+ߞ/¨¼¥½\\6蟢¼dmhע@q폍Ձh֩,J­חǣm÷em]ӏeϫZb0ߥþY񝹭臦؞e¹B;¹ӪOɀwapDWûɜӻ\0À-2/bN¬sֽ޾RaϮh&qt\n\"՚iöRmühzϥø܆S7µНPP򤖤✺B§╳m¶­Y dü޲7}3?*tú򩏬Tڽ~佣ý¬֞ǉڳ;T²L޵*	񾣵A¾sx-7÷f5`أ\"NӢ÷¯Gõ@ܥü[︁¤̳¸-§M6§£qq he5\0ҢÀ±ú*ࢸISܒɜFή9}ýpӭøý`{ý±ɖkP0T<©Z9䰒<՚\r­;!Ögº\r\nKԋ\n\0Á°*½\nb7(À_¸@,\rÀ]K+\0ɿp C\\Ѣ,0¬^§º©@;X\r𿃜$\rj+ö/´¬Bö搠½ù¨J{\"aͶ䉜¹|壜n\0»ܜ5Љ156ÿ .ݛد\0d萲8Y瓎:!ј²=ºÀX.²uCªö!Sº¸opӂݼ۷¸­ů¡Rh­\\hE=úy:< :u³󲵸0si¦TsBۀ\$ ͒逇u	ȑº¦.􁂔0M\\/ꀤ+ƃ\n¡=Ԍ°dūA¢¸¢)\r@@¨3ٸ.eZa|.ⷝYkУÀ񖧄#¨Y򕀘q=M¡ﴴB AM¤¯dU\"Hw4>¬8¨²Ã¸?e_`ЅX:ā9ø��ФGy6½ÆXr¡l÷1¡½ػB¢Å9Rz©õhB{\0륞íⰩ%D5F\"\"ڜʃúiĠˆٮAf¨ \"tDZ\"_֜$ª!/Dᚆ𕿵´٦¡̀F,25ɪT롗y\0N¼x\r癬¦#ƅq\n͈B2\n웠6·Ĵӗ!/\n󃔙Q¸½*®;)bR¸Z0\0ăDo˞48À´µХ\n㦓%\\úPIk(0Áu/G²Ƙ¹¼\\˽ 4FpGû_÷G?)gȯtº[v֜0°¸?bÀ;ªˠ(یඎNS)\n㸽萫@ꜷjú0,𱃅z­>0Gc𣌅VX􃑱۰ʘ%ÀÁQ+ø鯆FõȩܶоQ-㣝ڇl¡³¤w̺5Gꂀ(hcӗHõǲ?Nbþ@ɟ¨öǸ°3U`rwª©ԒUÔ��ԽÀl#򵏬ÿ䨉8¥E\"O6\n±e£`\\hKfV/зPaYK珌ý 鏠x	Oj󛏲7¥F;´ꁂ»꣭̒¼>愐¦²V\rĖļ©'Jµz«¼#PB䄒Y5\0NC¤^\n~LrRԛ̟Rì񧀥Z\0x^»i<Q㯩ӥ@ʐfB²Hfʞ{%Pܢ\"½ø@ªþ)򒈑DE(iM2S*y򓁜"ⱊe̒1«ט\n4`ʩ>¦Q*¦܁y°n¥T䵔⤔Ѿ%+W²XK£Q¡[ʔଁPYy#D٬D<«FLú³ՀÁ6']Ƌû\rFĠ±!%\n0cдÀ˩%c8WrpG.TDo¾UL2ت鼜$¬:灘t5ƘY℉p#񠲞^\nꇄ:#Dú@ֱ\r*ȄK7\0¸CC£xBhɅnK蜬1\"õ*y[ᣡ󗙢ٙ©ʕ°l_¢/öx˜0ɚ5Кǿ4\0005Jƨ\"2%Y¦a®a1SûO4ʥniøPߴqʽ6¤~ȉ\\¾dúdѸ®D܈µ3g^㼀^6ՆÀHD·.ksL´ԀùɈ殭I¦ĆѾĜrb @¸ӀNt\0s邝:uퟹ�b@^°1\0½©¥2?蔀󶤌Neɓ+ꜰǺ©Ё²l¡z6q=̺x§玶 ܏,%@s0\n朜)ҌL<򃊼·¦P¶b¢¼ΝA>Iᜢ	ܙ^K4ügIXi@PjE©&/1@榜	ԎẸ0coaߧÁª󬃜'ܹ#6F@¡РH0Ǉ{z3t|cXMJ.*BЩZDQ𥂏\0°񓔭v¥Xa*ݬ*übÁˣxјݤPƲKG8ƠyK	\\#=詭gȑh&Ȝ8])½CŜnô񀹼zW\\gþM 7!ʛ¡󋆖¬,Ų9񲊆©©\$T\"£,¨%.F!˚ A»-੏ø¹-৐¨⊜0002R>KE'ٟؕIз쳓9³˼¡j(Q°@ˀ򴯬7��'J.⇒T\0]KS¹DAp5¼\r0!䛂´e	d@RҝҠ¸´ʹ¢S©;7HBÀbx󜊨֟viѕ`@µÓAM¯XˏGؘiٓU*¬ڶʟõûͿ'øݺV򗊶£D¾ÿN'\$쐺h\$d_y§Z]­󜙊°³8ؔþ¡杨P윐*hԖ§e;ºpeû¢\$k淧쁪7N²DTx_Ԕ§½Gi��Ԇt͆¨b蜜Eƈ\$iE\"cr½尬?>Á񌑃(W@3ȁ22a´IÁ๕¡{¥B`ܚ³iŸGo^6E\r¡ºGM¤p1iى¼¤Xª\00032ǚKü§Ӵݺl&ֆ'IL֜\Μ"7¤>¬j(>㪴FG_ℤ& 10IƓA31=h q\0Ɔ«ķݟJªԳVΖº܆qٕ¢ى (/¾dOC_sm§<gx\0°\"𜮀EkH\0¡J­®8(¬¨¯km[쿁S4𜮓Y40«+L\n¦À죂ӫb瀥R֖°µ׭ÀR:Ɛ<\$!ۥr;ǉ%|ʨᄐ(|«H\0ŰÁЏ°]£ҡ=0¯횡¨\"\"=֘)½f뎟6V}F՚=[ɐৢhu��\0t¥増~ºõQՖiJöL񵗭q#kb ݗn««͑øT!놁¥õncSћ+ִE¯<-a]Ń왢Ӝn\nJ~䗼JɃ8® 쌂pÁ毱 N䩁ܨJ.ùŃSȈ¡2c9ê©y-`a\0Ķ*얈@\0+´حgɚ6°1¤ԍe\0ªˑ _}!IöGLf)Ø񯋬Shx\0000\"h𫌃¥MԘɠªј±ʚ	j\0¶ µ/\$¨>u*Z9®eõ«+J¸tzȋûȾR¨KԯЙѢDyޙqᰃ-f¢ŗm¶¹ªBI�¹HBsQlÀX°.݅öԜ|¸cªÀ[󚨚僬¨۸'µ ml²KrQ¶26½]¯ҷn§d[ݶ񎩇dþ\"GJ9u򻂃o©Zߖա¥²n@Áªn°lW|*gX´\nn2冬|x`DkuPP!Q\rr`W/¹	1曘-o,71bUs¢©玸7²ˉۇq¸.\\Q\"CCT\"摠Ē*?u¨ts¶°ǝᙩPz[¥[YFϹ¢FD3¤\"ºǝu۝)wz­:#¶͝Iiwꝰɛ»񻯁oփ0n𶛻բ\\鸸°؜0q·m壭ª&ؾ®7²øÀ¹9[¤H鱤LOº2´v|B¯t抜\ƤHd¦뢈\" 򬒎\n\0·©GŧΆ ¸F}\"쭦QEK¾{}\ryǎ¾rכtÀԕNuó[Aøgh;S¥.Ҡ±¥|yùϛՆ_b򖈨¬!+R񨚘ù@0N驆þÁPބ쥡jD£¯z	þ׈[øU\"¶{e8��EL4Jн0¡¦获 ´d·¬ ÀQ^`0`¯]c𼧇@²hy8�ef\n󃎥haXڃømSߟjBژQ\"\r뗇K3=>ǪAX[,,\"'<µ%¶a«ӴÄµ.\$񜰧%\0ᐳV¤˰ M\$¼@jᗰ>¤­}VeĜ$@̈́#§ªШ3:ø`U𚙌¶u暨ûϢ΂@Ė#EG/¸üXD\$hµav¼xS\"]k18a¯я9dJROӊs`EJ°½§øUo³m{l¹B8¥Á(\n}ei±büø, ; Nª͇øQ؜\菇¸I5yR¼\$!>\\ʉguj*?n°MӞ²hݸ\r%Á³ըd¦Nµd#}pA:¬¨ý-\\苁»*Ĵ2I®蜲֣» 0h@\\ԵɐÀ8𳂲q]򹤸\"𑠌ÿ:cƠyǴ	ϡdaΠ6>Uہڝѝ:½@2ۏÿ\$򥨞2´ûF»§əN᫒\rþԀ(°d*ü\0[®#cjû´>!(Sퟡ�LeýTɆM	9\0W:BDýø3J¬՟@sǡrueø¦𻍽¬ +º'B«ɽ\"B\"üz2띔l»xF[茗ً²Ea9 ʣdb½¾^,ԕC=/2»ײ¼ø쯜$Cƣڷ8¡}DÀۿ׶ϐ`^;6B0U7󷟽	,ª1⪱V[¨.	H9(1ﱆ±ҏLz¢C¸	ǜ$.Aʦh㖫¾͠rY	ýHإ~or19撗م\\߄P)\"Ñ¹´,ѥ򶓌¾w0ϙ\0§ϻw싘³ǝ¨籯¹~«ö績9􃾽²򺤣¿\0劧¾¶fιq&9¹-ýJ#¤¸ª3^4m/̈¯\0\0006À¦n8£·>䈴.ӗ鿒cph±˙ùº_A@[7«|9\$pMh >Á5°K¥úÅ=hþAҘt^▗	©\"	c£B;¤öީՑҠt¬򩀬\nة­󐈳Ӡ°°;ц4´I�©�y -¤0yeʨUB³¥3HPǇ˵ꯒs|·º\r𝗞М$0㨲򅒱½©l3騪oF~PK´ª.ý,'·J/Ӳt𐑍d:n§\n©𖪆Y«zꨆ󒄼w°ݒ Z죚ʉIo@1Ǝ»\$ﲱ¦=VWz	nBøaúA»µqª@´Ip	@ѵӖlH{UºܯXõ¿fퟹ�\\zµ׮§²,-\\ڗ^y n^ŗʐBq·þ¤zX㉡\$¨*J72Մ4.՞!¤M0¶󄫬Fೣ G¡όmأ*mI£嵉»^t¿ªjl7替S¶Q ¢.i閔h¨õLЖڱB6Ԅh&l\\𗥪cΦ%kjÁ ¦pÒ=䙓i@.õ¥(䲏klHUW\"o¥j½§p!S5ƨ­pL'`\0¤O *¦Q3XެJ\08\n\r·²¸*a񼁫¼ûr`<¤&ڗXBhָ!x®&䎌Bht¥\$ÿþ]ɮ߆鳉cL[Ƶ©d¸ἠ®\0¢ςޡw揙%;õBC»Q\r̭ӝ쿝쀓p¤«ؐQ¶Z¸úZÁAu=N&Ўia\nѭK6I}їn	Ŵ\nd)�ȷbpΏ\"𧧦07õȦ@⋷帘 NÀxġö­ú\$BùߚB/¶M¯gB»i¦֑§¶\\⭃mĪʧ;5=#&4̧þPՍ½鰱풁䛜\,q¤cޟ\ncₖ¾׺w\0BgjD@;=0mk®ĜrĲ`À¤'5¤¶k-{¢\0¯_Mu2җ§»£Àqø¬𾞩9ȗ\n䌤+Ԕ§ÀG\rýî4䏘:5ö޸»1µ:Κ?¥(yGgWK\rݷ­²m5.eH٨J«Ak#»ӌ¶..\\Ύ=Ձ񕙐Ӻо7ºW+^yDb­üG¡OZ͒4(|xµƽPr¸£,y©иqaܩO2µkªn#p2¾ûǈºؔ.¼£cUcö䫅j󜤴�¬~7ZR:𗆸­9Ψw(aL¤%­-,ԄȬ¿#��8þɼޣ¬ڗ%XWn}6H쿱拞¤¡#¹&J,'zMüM¢࠺܆² ®/y6YQ¯춚ºdәdÁ޳Ϻõ㴣Ep2ggÁ/ˤڕ'8쌞;´UWNхޕ{ɏC򅑖¤��iKX¢ڔNdG£RCJYõi²׹#>zS²MUc£õ¨ûÿ꒏RԾ¡0)ذʺ]:=ϞtÁ멧\$sҲFöٶ7	=\$Bėӌ!qs	1\"ü¬vƔ÷%Il<ʂb!ۮ6(Cd-ʞ<H`~2¹K썺KݙԱ­ٕy,qA᪺\0}݃¨pb\\ӓ嵝߹ڧ(ᓭ|»M밄ÀWڀ5;\$5µT|º򇻫õ񏈴@򑢻9³)½򻩐.ۻ·ퟥꗌF¶=񐜄䥍`Hނ\0	 N @°%wªd萢𜤈|kƛ¾ܤCI!:lż,§¨ý<÷u򓙂t��NeϝW^¡w觶D¿ᦽu ¬ihI÷Z:Ѿý÷ϣr¾ȺĖ3õ+¯uoC·s2բƵaX𷗋£	HԶ27>●͝yÝ£¬ݍ늍£rpT¼Lퟧ�f:ʵA²t䊤|i½³[wü誃W 7¤£au© ú률򕚁5­Q' ʐ\0Ȍ 3Ҿ\$罌\rk)a; 󦈽ù֐~󉇊I氼ù´\"ù¬ɉ1'蠙¢Gcm\0P\n﷨ü#͓>½۸B\"񒅭|ù2\$}<3PYXgo£d߶<Ծ£¿qE\"`׺ȴᑿg«8r£]\n¡õ:øqVbT죒m°9K&ғĤÂmԷ)@¨ÀQzÓ=¢½ߵű퟈\nԫö}O穽»\r٣.¢¹v®p¾JW&ߵ׵50	ԵÀIÁ\n½ۭ¸³Ʀ­l\0O5*=޺	P-¢銈\0󦗥̴ぺ*¥S:±tϛ ?øȂHⱷºq4ЗK͒§@Ԭ»܂.O(±뼠Z¡\$ϊӝ¼ů¿nz«A±!t85<W񒲛8򂶹n5\$I݁µ浕Z¤À鳝'}ET\nú䮘�䷦ϖˀ¤_ÀDoȽ&J6°ߴiê\$ȒEL¢依uܴ¢ˤ+I¡Т¢ûأ~üS±SZTXҁ ¾PYz½Ŝ"\$Vǟ]ÿM(§㷲ºü·ڌჀt_´S󈌁ê/­ߑt½Ăü¿⭈亜0»5ୠ_Z'#ö¥Á1P¿鴐,}(°~¸\0싾!Җ`-þP\neùy (¿ʁ `9O˺!Á;5\n½\$ꎻú¯þ𬕁ü¨7ù᡿粀[ý ¸Yý¿ņ濴ÿý¯𾨌8&޿!CLѦÿH¯õ(\0'Ǐ2û줜r%;૦4ûÀ_OϾþ5³ö׀DýҼϞ\0VÁ6' AY¬¢¶ýS°¿££rԾ´4+h@bÿ㵈­¾´þOᔍ\0À嘀r̛ú@ÿ\rJùӭ0\08ùO򀬿;kӠʁ뾁(6£|	`8 ߜ0°&¿²EЖϥ\0Vþ㱏kNÀ°KùÁ¡xdpÀҿs쁘L§⫁¾X뫏ÿu\0ﾄ̓t ÀԢ򮂉>(Nŋ'fldúA⿫+ퟹ�~ ÿ²úk怖¾²ªPR\0躸¡؂・芑��K]¦bUÅђ\\̛¸d\0S@¿䫑Àb\0\0b֜0_\\¡@\nNO΁PfÁ ¶􁔏Aj ¨4<¤9°ګ灀¿¨`S 켔ȷ3Tퟞ�7⁘»T!\0eIȢ 1!\04³堧¹ @ ! 8\0˯ º!:K,؃AS𘑦®e©΍ùý.:¼:򆴟»¡Ì._ºdÿ°81v`B\"䂅!.^ڪ塎.^\n&\r(.Á©§O0«@÷َP¹nj҄Θڗ#¡¼妹rHؼ¨  ¢!ҳ¶ܨi @܁AaÁŇ{õ ¬#ɓ©½6𨘶F@©Ԇ¦㙛O( .¬/Bü˱ǳ)L02B؈̭Áƀعqp¹J<¤.Б\0\n燯\0Ёԯ@8C¤4PÀǜr	P°)üퟘ�⥜$q.]¬\"B#ŉ#\\£¸4\$ó:.(*Oi>|#T'`Bu«a/ダ؋a꘸Ε`p ¸ڕÁ\0`ʜ0");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0F£©̐==ΆS	Њ_6MƳ訲:ECI´ʯ:CXc\r昄J(:=E¦a28¡x𸿔ħi°SANNù𸳅NB጖l0瓉˕l(D|҄犐¦À>E㩶yHch䂭3Eb堸b½߰EÁpÿ9.̾\n?Kb±iw|ȠǷd.¼x8EN¦㡔͒23©ᜲљ̨y6GFmY8o7\n\r³0¤÷\0Dbcӡ¾Q7Шd8Á읅~¬N)ùEг`􎳟𠆓)Џ闋·烯º<xƹo»ԥµÁ쐳n«®2»!r¼:;㫂9CȨ®Ün<񍈠ȳ¯b蜜?`4\r#`Ȕ<¯Beィ¤N ܣ\r.D`¬«j괿p閎ar°ø㢺÷>򸓜$ɣ ¾1ɣ ¡c Ꝅ껮7ÀÂ¡Aퟹ�RLi\r1À¾ø!£(攋j´®+ª62ÀXʸ+ʔ⠤.\r͘Ζ􃎖!x¼厃hù'㢈6S𜰒񏒜n¼1(W0㜇7q뺎Å:68n+䕴5_(®s \r㔪/m6PԀÅQĹ\n¨V-Á󜢦.:劍ϸweα½|؇³XЗ]µݙ XÁe店⼠7⻚1�f٣u£jѴZ{p\\AUˊ<õk၀¼ɍà@}&L7U°wuYhԲ¸Ȁûu  P෋Ah茲°޳ÛꞧXEͅZ]­lဍplv©栁ÁHWԹ>Y-øY诫ªÁhC [*ûF㭅#~!Р��0Pf ·¶¡\Ɏ^åB<\\½fޱšН㦯¦Oퟱ�\jF¨jZ£1«\\:ƴ>N¹¯XaFÁÀ³²ퟍ�fh{\"s\n׶4ܸҖ¼?ĸܞp\"띰񈸜\ڥ(¸PNµ챛g¸Árÿ&}Phʠ¡ÀW٭*ޭr_sːh༠Мnۋïmõ¿¥êӣ§¡.Á\0@鈰dW ²\$Һ°Q۽Tl0 ¾ÈdH멚ۏٟÀ)PӜ؈gཇUþªB襜rt:՜0)\"Ŵ��ۇ[(DøO\nR8!Ƭ֚𜬁üV¨4 hޣSq<=ëʧK±]®ਏ]⽹0°'坢øwA<НѡÁ~򗆗惄|A´2Әٕ2੹Ŋ=¡p)«\0P	sµn3f\0¢F·ºvҌG®ÁI@饤+Àö_I`¶̴Ŝr. N²ºˋI[ʖSJ򅩾aUfSzû«M§􄋥¬·\"Q|9¨Bc§aÁq\0©8#Ҽa³:z1Ufª·>¹l¹Ӏe5#U@iUG©n¨%Ұs¦˻gxL´pP?B猊Q\\bÿ龒Q=7:¸¯ݡQº\r:t쥎:y(Šד\nۤ)¹В\nÁX; 쎑꓃aA¬\r᝱P¨GHù!¡ ¢@ȹ\n\nAl~H úªV\nsªɕ«ƯբBr£ªö­²߻3\rP¿%¢ф\r}b/Α\$5§P냤\"w̂_玉UէAt뤴夅鞑ĥUɎĖjÁ�vh졄4)¹㌫ª)<j^<L󠴕* õBg 됦誮ʖ譿ܵӜ	9O\$´طzyM3\\9ܨ.o¶̐븅(i几ē7	tߚ靭&¢\nj!\rÀyyıg𒶝«ܹRԷ\"𦝧·~À�)TZ0E9M噚tXe!ݦ@终¬yl	8;¦R{븇ĮÁeثUL񧂝F²1ýø渐E5-	П!Է󠛲JˁÁ;HR²鑇¹8p痲݇@£0,ծpsK0\r¿4¢\$sJ¾ôɄZ©Չ¢'\$cLRMpY&ü½ͩ珺3G͕zҚJ%Á̙Pܭ[ɯx糔¾{p¶§zCֶµ¥ӺV'\\KJa¨Í&º°£Ӿ\"ಥo^Q+h^ₐiT𱪏R䬫,5[ݘ\$¹·)¬��U`£SˠZ^𼏀r½=Џ÷n登TU	1HykǴ+\0vᄿ\r	<ƙ챪G­tƪ3%kYܲT*ݟ|\"CülhE§(Ȝ\rør׻ܘ񰥲׾لܟ.6и軣ürBjO'ۜ¥¥Ͼ\$¤Ԡ^6̹#¸¨§洝Xþ¥mh8:껣þ0øל;دԉ·¿¹ػ䜜'( ú'+򽯌·°^]­±NѶ¹磇,붰׃OϏiϖ©>·޼S\\\!س*tl`÷u\0p'跅P࿹·bs{Àv®{·ü7\"{ۆr(¿^漝E÷úÿ빞gҜ/¡øUĹg¶Ȕ`ĜnL\n)À(Aúa𜢅 瘉Á&PøO\n師0(M&©FJ'ڈ! 0<ƹ¥*̼솪珚�n/bö®Ԍ¹.좩o\0ΊdnΩùi:RΫP2ꭵ\0/v쏘÷𜸆ʳψ讜"񮪶0õ0ö¬©�ːgj𰜤񮩄0}°	=MƂ0n/p毴쐀÷°¨𮒌̽g\0Щo\n0ȷ\rF¶鋀 b¾i¶ï}\n°̯	NQ°'𸲐FaЊLõ鏰ЄƜrÀ͜rֶ0Ň񧌰¬ɤ	oepݓ°4DМʐ¦q(~À̌ ꜲE°ۑprùQVFHl£Kj¦¿䎦­j!͈`_bh\r1 ºn!͚Ɏ­z°¡𥌍\\«¬\r튃`V_kڃ\"\\ׂ'V«\0ʾ`ACúÀ±Ϙ¦VƠ\r%¢Ŭ¦\r񢎃k@NÀ°üB񭚙¯ ·!Ȝn\0Z6°\$d ,%६a툗\n#¢S\$!\$@¶ݏ2±I\$r{!±°J2HچM\\ɇhb,'||cj~gв`¼ļº\$ºĂ+ꁱ𜅿ǟÀ٠<ʌ¨ќ$♥-FDªdL焳 ª\n@bVf辻2_(봌Đ¿²<%@ڜ,\"꤄ÀNer��`Ď¤Z¾4ň'ld9-򣠤󅖅ඖ㪶놣㶇 ¶Ε͐f ֿ@܆&B\$嶌(𚦄߳278I ࿠P\rk\\§2`¶\rdLb@Eö2`P( B'㈋¶º0²& ��§:®ªdB屲^؉*\r\0c<K|ݵsZ¾`ºÀÀO3굽@嵀C>@*	=\0N<g¿6s67Sm7u?	{<&L®3~DĪ\rŚ¯x¹�,rnů 咏O\0o{0kΝ3>m1\0I@ԹT34+ԙ@eGFMCɜrE3˅tm!ۣ1ÁD @H(Ӯ Æ<g,V`R]@úɳCr7s~ŇI󩀜0v5\rVߧ¬ ¤ Έ£PÀԜr✤<bЅ%(DdPWĮЌb،fO 渜0轠܋┬b &vj4µLS¼¨ִԶ5&dsF M󴌘Ӝ".Hˍ0󓱵L³\"/J`򻇾§ʸǐYu*\"U.I53Q­3Q��g 5sຎ&jьյ٭ЪGQMTmGBtl-cù*±þ\r«Z7Ե󪨳/RUV·𴪂Nˈ¸Æ󣪅Ԋ੨Lk÷.©´Ĵ젩¾©rYiթ-Sµ3͜\T돍^­G>ZQjԇ\"¤¬i֍sS㓜$Ib	f²⑵榈´庄ꚓB|i¢ Y¦ฉvʣ锄ª4`.˞󈅍_ռuÀUʺ`ZJ	e纝@Ce�\"m󢒄6ԯJR¿֌T?ԣXMZ܍ІͲp蒏¶ªQv¯jÿjV¶{¶¼Ń\rµշTʞª ú�Pö¿]\rӿQAÀ脇Ͳ񾠓V)Ji£ܭN99fl JmͲ;u¨@<FþѠ¾ejҎĦI<+CW@ퟅ�瀿Zlѱɼ2ũFý7`KG~L&+NٴWH飑w	փ򬀒s'gɣq+L麢iz«ƊŢА.ЊǺW²ǠùzdW¦۷¹(y)v݅4,\0Ԍ\"d¢¤\$B㻲!)1U5bp#Žm=׈@wĉP\0䜲쌢·`O|놎ö	ɍüŵûY��öEיOu_§\n`F`ȇ}M®#1႗¬f쪴աµ§  ¿z൚cû³ xfӸkZR¯s2ʂ-§Z2­+ʷ¯(峕õcD򑷊옝X!͵ø&-vPИ±\0'L øLÂ¹o	݋��Ӝr@ِõ\rxF׼E̈­鹿ㄬ®ü=5N֜¸?7ùN˃©w`بX«98 ̘ø¯q¬£z㏤%6̂tͯ䌬돌úͬ¾ʬ܋aN~όÀ۬ú,ÿ'퇀M\rf9£w!x÷x[ϑ؇8;xAù-I̦5\$D\$ö¼³%ظѬÁȂ´À]¤õ&o-39֌ù½zü§y6¹;u¹zZ 葸ÿ_ɐx\0D?X7«y±OY.#38 ǀeQ¨=؀*Gwm ³ڃYù ÀڝYOY¨F¨횙)z#\$e)/z?£z;ٚ¬^ۺFҚg¤ù ̷¥§`^ڥ¡­¦º#§ر©ú?¸e£M£ڳu̥0¹>ʜ"?ö@חXv\"盔¹¬¦*Ԣ\r6v~ÏV~&ר^gü đٞ'΅f6:-Z~¹O6;zx²;&!۫{9M³ٳd¬ \r,9֭°䷗Ɲ­:Ꜳúٜù㝀睂+¢·]̭[gۇ[s¶[iٝiȱy鸩+|7ͻ7˼w³}¢£EûW°Wk¸|J؁¶剸m¸q xwyj»#³e¼ø(²©¸Àߞþ򳠻蟚 y »M»¸´@«扂°Y(g͚-ÿ©º©䭡¡؊(¥ü@󅋻y£S¼µYȰ@ϥ賞úo9;°꛿��+¯ډ¥;«ÁúZNٯº§ k¼V§·u[񼸝|q¤ON?ɕ	`u¡6|­|X¹¤­س|O측뺏¨ϗY]¬¹c¬À\r¹h͹nΌÁ¬¬덎ϸ'ùꙌ࠿ƜrS.1¿¢USȸ¼Xɫˉz]ɵʜ¤?©ʀC˜r׋\\º­¹ø\$Ϡù̩U̼ˤ|Ѩx'՜،䊼̙eμꍳ痌⒌闌Mι(ۧЬк¤O]{ѾטFD®ՙ}¡yuф߬XL\\Ƙxƈ;U׉WtvĜ\OxWJ9Ȓג5·WiMi[Kf(\0澤ĚҨ¿©´\r숍ġș7¿;ȃƳұ瓶KʦIª\rĜøv\r²V3՛߉±.́ҹ¾ɘ἟ᾙ^2^0߾\$ Qͤ[㿄÷ᜣ徱'^X~t1\"6Lþ+þ¾Aޥᜓ枝剑羟墳Ⳁߕ­õpM>ӭ<´ғKʛ筈ɀ¼T76ٓMfg¨=»ŇPʰP֜r¸龍ö¾¡¥2Sb\$C[ؗ羽ĩޥQ#G`u𰇇wp\rkދezhjӄzi(��«󑄞Ӿؔ=·7³򮾌ÿ4\"ef~񖐮�ÿZ÷U-뢧VµJ¹Z7۶©T£8.<¿RMÿ\$��ߢy5øݵ_෱Θ°핚𒠥i޿Jb©g𵍜Sͫ?ͥ`öឬ+¾ϯ M裡7`ùﭜ0¢_ԭûõ_÷?õF°\0õ¸X崆[²¯J8&~D#Áö{Pش4ܗ½ù\"\0̖Àý§ý@ғ¥\0F ?* ^񯍹寚w됞:𗁾uϳxK͞󷓼¨߯y[Ԟ(斑µ#¦/zr_g·濾\0?1wMR&M¿ù?¬StT]ݴGõ:I·ࢷ)©B v��1珼��Ȣ6½:W{À��=Ȯޚ󸺂!!\0xՔ£÷q&ᨰ}z\"]Ğoz¥Ҫ÷ןʚÁ6¸Ҋ¢P۞[\\ }ûª`S\0ऱHM믷BP°]FT㈕8S5±/Iќr\n ¯0aQ\n >ò­j;=ڬۤA=­p£VL)Xõ\n¦`e\$TƦQJΖk´7ª*O뎐 .򄡁\röµ\$#pݗT>!ªªv|¿¢}뗠.%Á,;¨ꈛ噅­ڋf*?«焘ﴄ\0¸İD¸! ¶õ#:MRcú蓂/06©­®	7@\0V¹vg ؄hZ\nR\"@®Ȇ	ʤ¼+ʚ°EIޜn8&2ҢXþPĬͤ=h[§¥櫐Պ\r:čFû\0:*垜r}#ú!\"¤c;hŦ/0·ޒ򅪮큂Ν񚒎\0ڀiW_®h;VRb°ڐ%!­싢]SBõUl	墒³鈲ܜrÀ-\0 À\"Q=ÀIhҍ´	 FùþL莆xRэ@\0*ƪ5ük\0ϙ0'	@ElOچH Cx܅@\"G41Ă`ϼP(G91«\0𜢁f:Qʍ¸@¨`'>7ш䤀¨퇒41羌rIHõGt\nRH	ÀĢҏ¶71»즣h)Dª8 B`À°(V<Q§8c? 2´E4j\09¼\r͐ÿ@\0'FúD¢,ŕ!ӿH=Ҫ E효׆ƿѪ&xd_H÷ǢE²6ľ£uȟG\0RXýÀZ~P'U=ǟ @菈l+A­\nh£IiƔü±PGZ`\$ȐþÀ¤ٮ޻ÀEÀ\0} §¸Q±¤䓥葉jAWإ\$»!ýɂ3r1 {Ӊ%i=IfK!e\$ީ8ʰ!üh#\\¹HF|i8tl\$𓊬À쬤i*(񧌉 ߜ$xخ豜"Wzs{8d`&𜆗��&E´¯ͬ15jW䛢¬öćʞV©R³¿-#{\0Xi¤²ħ*÷7ҖF3`妏©p@õŎ#7°	冂0曒®¬¸[øéh˖\\ᆯ{ȡޔ­ʒ]²¼Ŧᑀ8l`f@reh·¥\nʞW2Ū@\0`K(©L̷\0vT˜0壧L¯À: 0¼@L1׆T0b¢ਂþW̼\\ɭ诏DN󞀜ns3Àڜ"°¥°`Ǣù肒2ª倦¾\rU+^̨ReSni0ٵ˚b	J¹2s¹Ͱs^n<¸¥򢙱Fl°aؗ\0¸´\0mA2`|؟6	¦nrÁ¨\0Dټͬ7˦mܟ§-)¸ʚ\\©Ɠ䝌\n=⤌໪ ޢ蓈Ĕy7cú|o /ԟߺP<ـY: K¸&C´짇/ŀΠQ *8綒/À&¼ü򗭶p.\0ªu3«񂱺(eOPᰉ駲ü٣\rᰞ(ac>ºNö|£º	t¹Ӝn6vÀ_;yՎ趦ügQ;yúβ[Sø	䫧öǰ菒ud¡dHH𽁄 Z\r槚ʹqC*) ǅꏒ \" 𨌆!kШ'`\nkhTùĪösĵR¤Eöa\n#֡1¡¿ל0¡;ƇS©ȼ@(ଦÁ¸Iנ̂v\rnj~ا63¿Έ􉺨°Ԃ\n.«2plĹBtⰜ$bºp+ǀ*tJ¢ퟰ�sJQ8;4P(ýҧѶ!.Ppk@©)6¶5ý!µ(ø\n+¦ػ`=£¸H,Ɂ\\Ѵ4\"[²Cø»º1´-茬uoµ临[±ⅅʥ\"�� ٨㠜ʏTe¢)ꋴAE={ \n·`;?݂��G5I¡�.%Á¥²þ鱥Eýs¢鞩gF¹s	¦¸KºGѸn4i/,­i0·u聸)73Szg⍁V[¢¯h㄰'ь<TM¤䪁P*o≴\nHΓڿŜn 4¨M-W÷Nʁ/@¤8mH¢RptpV=h*0ºÁ	¥1;\0uGʔ6@s\0)��ƣT\\(\"腕,򕃺¥5iɋl«삛§¡E*\"겝ঔή@jR⊖Q/¨½L@ӓZ¥Põ)(jjJ¨««ª݌*ª¯Ĝ0§ªۜr¢-񑪄Qڜgª9龐@ՔH³¬\n-e»\0꿑w%^ ETø< 2Hþ@޴\0ퟚ�#;ö֞ITl¤ݫA+C*Y¢ªh/øD\\𣡩¬8»3AЙĐEퟴ�/}0tµJ|ÀݱQm«خ%(¬p´랡\nȑ±U˩\rsEXú5u%B- ´Àw]¡*»E¢)<+¾¦qyV¸@°mFH 򔔚BN#ý]ÙQ1¸ֺ¯얣ù\$敠þ��X¡úÿx« t@]G𭔶¥j)-@qОL\nc÷I°Y?qC´\rඃ(@؆˃X\0Ov£<¬R峘©µ¬Q¾J䜖ɋü9ֹȏlxCuīd±± vT²Zkl\rӊ폀\\o&?o6Eб °³ªɐ\r÷«'3úˉªJ´6맙@Ȅ6ɃFZ50V͖T²y¬C`\0䝖S!ý&۶6ɑ³rD§f`ꛨJvqz¬ۛF¿ 򴀛踝µ҅Z.\$kXkJڜ\ª\"˜"ۖi°꫺ӅÿµΜroXÁ\0>P¥P𭩝\0ªööµaV¨¸=¿ªȉ6¨´°ΈӪK3ڲԅZµQ¦mEĨ퟾�0:32ºV4N6³´ѡ÷l랚¦ـhµhUо:ú	Ѕ>j䨐ú0g´\\|¡Shⷛy\$,5aė7&¡밺[WX4ʘq֠승Ƥׂޣ8!°H¸ؖD§Ď­+턊:¡¥°9,DUa!±X\$Ր¯ÀڋGÁ܌Bt9-+o۴L÷£}ĭõqKx6&¯¯%xϴR¿鄰\"Տ蒂IWA`c÷°Ƚl6¾ė*¸0vkýp«ܶÀ뛟8z+¡qúXö䷪·EªIN¶ª嶪*qPKFO\0ݬ(М|°k *YF5厥;<6´@ؚQU\"ד𜲢؏AXÎv跶¯)H®��STȋpbj1+ŋ¢e²Á ʀQx8@¡Ј絜\Q¦,¸ĉN띞b#Y½H¥¯p1֊økB¨8NüoûX3,#Uک姄\"销¥eH#z­q^rG[¸:¿\r¸mng򜌌·5½¥V]«񭨝W𿰢둾kh\\Z堯鬰ꄜk oʐjõWС.¯hFԥ[tցw꿥¥M૫¡3!¬µͦ°nK_SFj©¿þ-S[r̀w䴸0^Áhfü-´­ý°?ýXø5/±©듫IY Ŗ7²ad 8°bq·µbn\n1YRǶT±õ,+!ؽü¶NÀT£2Iß·Ą÷ǲ؈õ©K`K\"𓽴£÷O)\nY­ڴ!}K¢^²ꂠD@ᅷna\$@¦ Ɯ$AjɋǗø\\D[=ˉbHpùSOAGho!F@lU˿ݠXn\$\\͈_¢˘`¶⋈Bŕ]ª2ü«¢\"z0i1\\އwù.fy޻K)£¸ pÀ0丐X>1	*,]ܲ\"ÿ¹<cQ±񜤴q.ü	<𬱙+t,©]L򡈻gü㘤¶\$¤6vùǠ¡£%G܈õĘȓE ҘÈ*Á0ۊ)q¡nCةIûܢµ嚅ތ툳¬`KF灝@碌5껁ȉp{\\䓇ÀpɾN򲆬'£S(+5®Њ+ \"´Ā£U0Ƃiː܆ú桋nMùbrKÀ𤶃º¡r쥢¬|aüʀ@Ƹ|®²ka͹WR4\"?5ʏ¬pýۓ񫄲Ę«¸¨ýߒ𦁼7Hp5YpW®¼ؒG#ϲʶAWD+`¬佊\"ø}πHќ\p°Ѐ©ߋ̩C3͡sO:)ل蟆/\r4逧<A¦\nn /T泦7P1«6ӄٽOYлϲ¢󟖱엻영À条ýXtS<㘼9nws²x@1Ξxsѿ¬ﳅ@¹׵4®o܈0»ސR\0؆অι·󢹱߇Ռ&S^:ْQ𾜜4OInZn粶ೋ¸3��L(÷ċퟔ�ஏx \$݂«C凩CnªAk磺Lٞ6¨͂r³wӌh°½وnr³Zꣽ軽jђ³6}MGýu~3ùĢg4Ź��󑝜鱣:¡3g~v3¼󀿼¡+ϼ��a}ϧ=Υ8£'n)ӞcCǺі4L=hý{i´±J瞾烓wgD໪LөϞҁ=6ΧNӔꅁ¢\\雄󆑎ꅽ?húSª>��úhh҅´WE1jx²��t֧δ۠²¸극¯Tö®[«,ժҶ򕮞t£¬A#T¸Ԧ9쨪K-õҞ ³¿¨Y詋Qe?®£4ӞӁ럗zߎ鳋@JkWYꨎְu®­窼z4׎õ	詘𭢉ϵ֜0>缟9ɗ«µ轠ö맖yҔu´»¨=}gs_º㔖¹sծ{竤@rמõڨݷψøH'°ݡ콩»֎Ŵµ¨뿟{϶ǴϨܶϗe [Пh-¢Ul?JO\0^ےHlõ\0.±Z¼␚xu悰\"<	 /7Á¨ڠû喙ҜnǠ¡´໭ǡÀ3ڈÀ_0`\0H`²\0H򑁣h[¶P<�עg¶ܚ§m@~þ՜0ߵk⌙»vڦ⣾¥ù\nz\n@̑񈜮(ǐݜnöüΧk󚔦肁º5n5ۨؙ@_`Ї_l1ܾ跰¿Pªޜ0cµЗoEl{ŝ¾鷓»¼¶o0Л􉢏ꮋzۊގ﷛¼ 织8øw=뮟| /y곒a퟼#xqێز¿»@﷫aࡿ\08d䒛wvǋRGp8ø v񜤚ü½¸mȎûtܞ݀¥·½�º܆û·ǽԮûuoݰ÷`2𣭼;#x»m񮧾;ˡV녣­ذąü3O\r¸,~o¿w[򡎪ø}ºþ clyᾱ¸Očޱ;?ᾬ^j\"񗺼:ߧxW.񈉁u(¸Ń䱗<g⧔v¿hWq¿\\;ߟ8¡Î)M\\³5vڷx=h¦iºb-Àކ|bΰఁyDЕHh\rceؚy7·p®܇@D=𠁖ù§1ÿ!4Ra\r¥9!\0'ʙ¥@>iS>怖¦o°󯲎fsO 9 .�✢Іl󲅛0尅!QᦧːD9dтW4\0ûy`RoF>FĈa0ùʙ󁰉À2缂Iϐ'\\񧈉̅\0\$\n R aUЮsЄ«昜"ù1ІeºY砢Z걜񱠼Ƿ#¯G!±PP\0|Hǆnp>Wü:¢`YP%ď⟜nȡ8Ð>ÁÁ薘`]4`<в\0ùÎ稻¡z4ك¥˸ùΐ4󍠭㨟:¢Ϊ¬HDª〪ϫp>*䋃Ī8䟕 08A¸ȟ:À»с´]wꕃºùz>9\n+¯秃͞À񘺎°iiPoG0°ֶ1þ¬)슚°ږ葮¤ȝ엥R֖ܭg£M¢ԀgsLC½r縐!°À3R)κ0³0��銈VPpK\n|9e[ᕖǋ²D0¡՚ ິϑªo¥ԩᨠ´,N8n嘳µ#{蓷z3𾒇¸BSý\";Àe5VD0±¬[\$7z0¬ºøË㽸þ	T 3÷»¨Q÷'R±خȓ¼LГyŋ춧£\0o䛬»\0:[}(¢|׺X>xvqWᓿtB҅1wG;󡮝5΀|ǰ¯»JI@¯¨#¢޵ņIី\\p8ۃ!']߮l-l哟Bذ,ӗ·»򈝨񬅱ԕHöÿN¸%%¤	ŏ/;FGS��霜لӎcԴ²¡Ⴒ|ùWڜ$tøμ˨ݏ¬+#¦Bꡎ1ù绂؟Ђyʷ򚐰2\\Z&)½d°b',XxmþH瀺d	>=-¦lK¯܏þJ퀙\0̌󀀲ϥ²@\"(AÁ񯪽Z¼7Ũ>¥÷­½\\ͦú¨#>¬õø\0­Xr㗙øŝ汽:Թ󜲬o札gbööÀ¿ÀD_Ը·C³߰.��R]ڟݫǁZ񇻗öIોGԒɪ(®ɑ|@\0SO¬ȳޓ {ø@k}䆘Sۢ8ॽ¾ȟԋ¹l²\0彈gÁʻ HÿɹGüա۠s_þJ\$hkúF¼q߆÷¢ɤ4ωø»斧ø½>vϏ¬ !_7ùVq­Ӏ1z뤵SeõjKdyu뛂S©.2\"¯{ú̋þ؋?s·䬋¦hߒ햤頺y٥ûGھ\nQ鋽·ٟow'ö﨓񩶈L֘}ퟢ�§¸G¾⭀9ý㭟üWݼ�¹û@_÷uZ=©,¸匡}¥ޏ0䉀䣷¶\"±'㙠¿Ҝ\?̟p󷪬Gú¯µýל_®±'忇úÿ²ЉT#ûo͈\rþ\"ʃ뺯㽧򿬾O鼔7缧΁´=8³M±񑔹��?±߮ ³ÿ\0ÿ±öbUd菶7þÁ¾I Oö䯻\"-¤2_ÿ0\rõ?øÿ«ÿ hO׿¶t\0\0002°~þ° 4²¢̋,֯h¼ΉPc£·z`@ڀ\"⒌ǈ; ,=̃ 'S.bˇS¾øã꬚¡R,~񆘓@ '8Z0&�np<pȣ𑳲(ü«.@R3ºП@^\r¸+Б@ , ö򃜤	ϟ¸E胴«B,²¯¤⪀ʰh\r£><6]#ø¥;탷.Ҏ¢ː8»P𳾰;@悪L,+>½p(#Эf1ĺ°Áª,8»ߠƆPູÀR𛳯¹)e\0ڢR²°!µ\nr{ƮeҔø·A@*ۊnDö6Á»𲳘퇝N¸\rRԸ8QK²0»੢½®À>PN°܈©IQ=r<ᑻ&À°fÁNGJ;𕁞õܚ¦ׁP&þõأ`©ÁüÀ);ø!г\0Ápp\r¶˾n(ø@%&	S²dY«ރ쯵Cڬ¥º8O#ϏÁ󲯪꒨¬v,¯#诼7ل\"Cp¡B��j¦X3«~RЀ¤¶ø¨£À9B#¹ @\nퟯ�>T퐵ᆑÀ-5/¡=耠¾݈E¯ǜn琓d\"!;ބp*n¬¼Z²\08/jX°\r¨>F	Pϐe>ÀO¢Lċ¯¡¬O0³\0ً)kÀº㦃[	Àȏ³ª'LىÓ屃雱 1\0ø¡C렱Tº`©¾쒊z¼Ě£p®¢°Áܚ¶쀅< .£>ݜ0䃻¹> Bnˊ<\"he>кºî£焳õ!ºHý{ܐ!\rМrÀ\"¬伐 >R1dං÷\"U@Ȅ6ХÁ¢3£簟>o\r³硌¿vL:K2嫆0쾁>°Ȝ0䭠®·B黡r*Hy;®`8\0ȓ˘¯��³û露ðÿ̀2AþÀ£°õ+û\0ۃ\0A¯wSûlÁ²¿°\r[ԡª6􂣯=¶ü¼0§z/J+ꆌøW[·¬~C0ùeü30HQP÷DPY}4#YDöºp)	º|û@¥&ㄭÀ/F	ቔ	­«¦aH5#뒈.A>а0;.¬­þYġ	êûD2 =3·	pBnuDw\n!ĺûCQ \0؂̈Q4D˒*񷜰Jı%ıpuD (􏑽!°>®u,7»ù1㓔M+3ù1:\"P¸ķRQ?¿üP°¼+ù11= M\$ZėlT7ř,Nq%E!̓±2ŦöU*>GDS&¼ª鳛ozh8881\\:ѕؚ0hÁȔ C+#ʱA%¤¤D!\0د򱁘DAÀ3\0!\\툣h¼ª�ϞT!dªτYj2��ȅʜnA+ͽ¤HȑwD`튨AB*÷ª+%ՅX.ˠB飺ȿ¸&لXeEo\"ׄ輩r¼ª8ė2@8Da＃ø÷Núh��ʊ8[¬۳ö¶®WzػZ\"L\0¶\0Ȇ8؂x۶X@À E£ͯ둨;¿af¼1¾;nÎhZ3¨E«0|¼ 옑­öAңtB,~􊗣8^»Ǡ׃õ<2/	º8¢+´¨۔O+ %P#ή\n?»߉?½þe˔ÁO\\]҂7(#û©D۾(!c) NöºэFE£#DX奄0Aª\0:ܲBƗ``  ږ茑³H>!\rB¨\0V%ce¡HFHױ¤m2B¨2I굄٫`#ú؄>¬ø³n\n:LýɹC񏊂0㫜0x(ޏ©(\nþ¦ºLÀ\"G\n@邏ø`[ó\ni'\0𩈹¼y)&¤(p\0N	À\"®N:8±鏮\r!'4|ל~¬秜يꐴ·\"cúǄltӇ¨0c«ŵkQQר+ZGkꁡFcʹӒx@&>z=¹\$(?󟃯(\n쀨>ɫҵԩCqی¼t-}Ǉ,t򄇗 xqۈf«b\0\0zլÁT9zwЅ¢Dmn'b H\0z񳹡¼єŠH󑚈z׀Iy\",- \0ۜ"<2'#H`d-µ#cljĞ`³­i(º_¤ȤgȎ퇂*ӓj\rª\0򾒂 6¶ºඉ2󫪣·<ڃqйĐɉ\r\$CAI\$x\rH¶ȷʸ ܀Z²pZrR£򠂟²U\0䁬\r®IRXi\0<²䄃̲~xÒS¬饙Ҟ%j@^ƴT33ɀGH±z񦜤(ɱ\0f&8+Ŝrɗ%얲hCüx¥Չ½lbɀ(h򓃙&ªÀ`f򸉶 n.L+þ/\"=I 0«d¼\$4¨7r惼A£õ(4 2gJ(D὆¡ⴈ娫û-'Ġ򘂂G􂲍9Z=ʬʀr`);x\"ɤ8;²>û&¡󧬗@¢¤2ðl²䔺0ìI¡¨\rrJDÀúʄ»°±hAȺ22p΅`O2h±8H´ĄwtBF²g`7ɂ䥲{,Kl£𛞌߰%C%úomû¾À´+X£�41򹸎\nȏ2p҉ZB!򽖆ܨ舀ثH6²Ê*菏ª\0恫ՠ%<² øK',3زĉ ;¥ 8\0Z°+EܭҠЌ²½ʣ+l¯ȏ˗+¨Yҵ-t­fˢ¡Q򷋟-Ӏޅ§+· 95LjJ.Gʩ,\\·򔅿.\$¯2؊蜜- À1ÿ-c¨²ˇ.l·fxBqK°,d·苀⸤A¹Ko-��æ²°3KƖ¯r¾¸/|¬ʋ寜\¸r¾˱,¡HϤ¸!𙀱¹0¤@­.&|ÿˢ+À銜0簐3JͭZQ³	»\r&á\nҌѪÀ˞jĉ|ҥ˦#Ծª\"˺Aʯ/乲û8)1#﷜$\"ȶ\n>\n��L1˲h9Θ\0BZ»d#©b:\0+A¹¾©22Áӧ̕\nt Čɏą粬ʳ.L¢HC\0鲠󫌢\\¼r´Kk+¼¹³˳.ꌒ꺻(Dƀ¢ʹ1sՌ򃤏s9̺¼ P4ʬϳ@.섡A䅮hJ߱²3󇋵0ѳJ\$\0쒲팫3㈡Qͻ3Ѯ\0\0ě,ԳÌûu/VAűµ³UM⼆Le4Dֲþ͖¢% ¨Ap\nȬ2ɍ35؄򐂁-´T͵53򛹱+fL~䜮��õ->£° ֒¡M4XL󓆔õdٲ֍*\\ڀͨYӫ¤¤ۓDM»5 Xf° ¬ªD³s¤䀕s%	«̱p+K鶄ސ/͔üݒ񸘤ނ=K»6pHƒ񥨐3ͫ7l؉£K0ú¤Ɍ펚D»³u굠±½P\rüٓO͙&(;³L@£ψN>Sü¸2˸(ü³ҠJ®E°r­F	2ü哅MMȡ\$q΅¶\$ԃ£/I\$\\㡉D哎\" \n䱺½w.tϓ	掄ђP𲣜nWƵ-\0Cҵ·:jR퍞Sü턅8;d젔£򵔪aʖǴE¹+(XröM뻌쳏±;´󼂬*1&΋2X哼õ)<͠­L9;򒓎¼ތ£ÁgIs+ܫӰK<¬񳵌Y-Z:A<ᓂOO*õ2vϗ7¹¹+|��»<Tֳչ h²Ϲ\$<􎣏;Զӡv±\$öO霰­ ¬,Hk򼄋-䵓Ϛ\rܺ²ϣ;¹O>칓·˷>´§3@O{.4öpO½?TübÏˮ뮌~O4􏓯Ϭ>1SSϪ4¶Pȣ󾼷Áϯ3휰җϾ´��徼볟P?4ۀ��NÀǹAxpܻ%=P@Ł҃πRǋ?x°󜮘´0N򷐏?ՃTJC@õΣ	.dþ·Mꌴ¯&=¹\\䴨āȥ:L¥휤ܩҎ­:\rΉI'Ł²AՂrግ;\r /񃝆􌈥B兓®i>L芛7:9¡¡ö|©C\$ʋ)ѹ¡­¹z@´tlǺ>úCꃌ\n²Bi0Gڂ,\0±FD%p)o\0°©\n>ú`)QZI鋇ڥM\0#\0DЈ ¦Q.Hড়$ͅ\n «\$ܐ%4IуD°3o¢:LÀ\$£΂m ±0¨	Ԃ£\\(«¨8üéh̎«D½ԃѳDX4TK¦{ö£x제n,¼\nE£꺒p\nÀ'> ꡯ\0¬ýtIƂ` -\0D½À/®KPú`/¤ꂸHל$\n=>´U÷FP0£눕G}4B\$?Eýۑ%TWD} *©H0ûT\0tõ´\"!o\0EⷱútfRFu!ԐD𜮃F-4VQHť4ѰuN\0DõQRuEɩ͉\n &Qm)ǚm #\\ҏD½À(\$̓x4WFM&ԜR5H奱咛F+ȹщF \nT«R3DºLÁo°¼y4TQ/E´[ў<­t^ҋFü )Q嫴°QIգ´½IF'TiѪXÿÀ!ѱFЪԮRʾª5԰чKm+Գǜ û£I嗴REý+ԩ¤ٍ\0ûÀ(R°?+HҀ¥J휢TÃDª\$ɴwQ½Tz\0Gµ8|Ҹ獟©R¢õ6ÀR悈	4XR6\nµ4yѭN��NM঒ӈ&ɲQ/ª7#蒛ܻ©'Ғ,|ǎ\n°	.·\0>ԻÁo#1D;ÀпU��J򹀪¸jý¯FN¨ґJõ #Ѿ%-?C􇟌¨3ՀEP´{`>QƂȔµԥO�I@Դ%,\"ՈӹIռ듏圤ԉTP>Мnµ\0QP5DÿӫOF՜TYµ<ÁoýQ=T\0¬x	5©D¥,0?͕iοxþ  ºmE}>μ¤ÀÀ[ȧ\0&RLúH«S9GI§1䀖M4V­HþoT-S)Q㇇F [ùTQRjN±㣸]N(̕8\nuU\n?5,TmԞ?пܿþ@\nµu-R깣𕯓 \nU3­IEStQYJu.µQҎõF´o\$&Àûi	܋PC󶂾嵵G\0uRÿu)U'R¨0Ѐ¡DuIUJ@	Է:喸*ՒRf%&µ\\¿RȈõMU9RøüfUAU[T°UQSe[¤µ\0KeZUa­UhúµmS<»®À,R荳¨`&Tj@燇!\\x��>¨þ\0&Àpÿ΂Q¿Q)TU吳®@%\0W	`\$Բ(1鑈?՜$C\nµOԊ¹񘍣ýV7Xu;֡YBӓ壃þѫV£΃񣍕՗H͕ýR²ǅU-+��Y}\\õȏK¥M윤ɓ�oV͈Tùѡ!<{´RӍZA5RÁ!=3U¤({@*Ratz\0)QP5H؏҂Ε°­N5+ϐ[ԭ9󖥜"µ²֘\n°ý񤇕SLµԖ򹔹ǌ땬À£\rVؤ͛ouºUIYR_T©Y­p5O֧\\q`«UכՂu'Uw\\mRUǔ­\\Es5Ӌ\\ú\\œ{ׁZ%Oõ¼\$܂¥FµԂ¬>ý5EחVm`õWd]& \$юŘۓ!R¥Z}ԅ]}v5À§ZUg��y` ѡ^=Fᒁ^¥v땅Kex@+¤ނr5À#׀?=uΓs ¤ץYNµsS!^c5𜤮u`µܜ0«XE~1﹒J󕚚¢@²#1_[­4JҲܮܤVI²4n»\0?򴡪R硕~)&ӲB>tR߉հÀԋ_EkTUS؂|µýUk_¸&E°ü(‘?‵חJҵҕ½JUBQT}HV֖j¤Qx\ne֝VsU=ԽVN¢4ղؗ\\x蒖34݇¿D\":	KQþ>[՜rՙ_壡ª#][j<6خX	¨쏍cأKL}>`'\0¨5XѣU[\0õ(ԙѝWt|t􀝒]pÀ/£]H2IQO­1ⓩQjZ¨¸´Hº´m¨̙)dµ^SXCY\rtu@J밼µ%ӿM¸ø¨󵓖?ٕQ°\nö=R塲:ԿE푀¥-G\0\$чd½ö]ҭeh*ìQWtöc¡`AªY=S\r®¯«	m-´¤=Mwֈ£]J圢䴏Ă õþ­fõ\"´{#9TeٍMԣ¹񎪉£򙟄¥õٜ畜6ٱgѲٗݝ¶ea­L´Q&&uT嘍51Y >£󏻓ý֊Q#ꉵ¥ժ\0û£ŗ PѾ?ub5FU󌝮¶)V5R¢@㫜$!%o¶ԃPúɧEµUÁԐ-¶¤Bp\nµF\$S4t±UF|{qֈ0ûΕmjs΃ü²øý\$´ڛjc뚐妖«¿aZI5Xj26®¤&>vќn\r)2՟k®TJځeQ-cVM­ֽ£z>õ]a¹c£ˣ쏟`tHڑjݘ6¹£+kM\0>##3l=৏´¥^6͜0¨èv¦Z9Se£\"׊ꝢΡԂ>)/TÁ=ö9\0ù`Pܤ\0¿]�ڪ«䵏½k-6ݛ{kü֡[F\r|´SѿJ¥õMQ¿D=õ/ȗX¢öVa¬'¶¹顨to©l冶Иj}C@\"ÀKPێցگm3\0#HVµv÷Ѿ{µֿgx	n|[ؿU¶䵛r꽨¶އ¸`õ3#Gk%L£ꜰ¿I`CùDު¸	 \"\0ŧ¶°#cN«6ߚ¹fzێ꺻ѤåeF7ٯN\r:��Gչ	\$ԳIøռºߝ£®TݘWGs«ԤWõMډ㨑٦Bcꛤ굂÷!#cnu&(ޓ㟕w£ùSf녦TZ:0C󓙌N`ܳYj=·¶>ŲñZ!=rV]gû	ӣrµ ˘lɭ.¹UħuJuJ\0s­J¶'W%·¶­\\>?򂶫V­j4µϊ}I/-ҝrRLºS蒳\0,Rgqӭ􇔦>ݱկ\0¥_ǜ\V8õ¡Z۴Ác耆ú<^\\ùll´j\0¾þT¥]Cݔw׎zI¶ٚwN¶¶pVWjv»Y¶>2Ӊo\$|UWÌ%{toX3_õ¶򒉊5~6\"ףZl}´`ԫc­ѮۥR=^UԎ¥1򑽷7eؓdµݶ٢=ᜰùf ,³m卩թGpûխӼ½)9Lý>|ԫ \"̀軤5§`:��,񴀺ďxº򬃆JȎ»b¨6 Žݡށ\0ػAR웁»ð\$qoAʓҒü@̔ø¬<@ӹđМ"as.⎿䷏V^讥^õ\0܃ȈÁ·[H@bK©ީzÀ\r·¨¤¤=鐁^¿zB\0º¿¤䎩o<̇t<x0ڬ0*R ºI{¥�^慵:{KՐ§1E0²әº௕ѣꀜ"\0긏4øɆ7'\nհ݉`U£Tù¤?MPԀӇlµȴӲ(	´ÁZ¿|&©t\"Iµ¿֛L w+ҭ}§÷Wi\r>֕__uŷ63߹[¢8µT-÷ٖϽ¤x㴟~襸7ٟ{jMᯟEù÷ؓ뾝��ߊõCaXG9\0007Ń5󁣌ႜ0.À䜲˴_֟¢ဟڕ%þက\n\r#<MŸ؊˹±|¸؁2ퟙ�¨;o^a+F�Χ¬LkúÁ;À_۝ꣀ¾M\\¬¤pr@䛈õƔø¾OR¿񖑾zǻAÁNE°YÁO	(1N׉Rø¨8؞C¼¦먉n?O)¶1A焇o\0䜲»Ǣ?૑J⮑\"⬎OFȌaùª-bඝPSø)ƙ 5xC⽀j°ǃLÁ舌\"胻Ί¤l#¢À酂諣֋@ Nº:꓾％B郞9Ȯ:Ný񝜤詓¥ CB:j6镠ΉJkuK🙝W͢ØI =@Tv㒜n0^o\\¿Ӡ?/Á&uꮞ؟朲®欫ڸc~±J¸b6Ӽإ\0͹󑡜0wxꨁ8j%SÀVH@N'\\ۯƛN¥`n\rҘuޮK豕Â髭f>G°\r¸»=@G¤ř䋤灂\n㩬ІOŠhʷÈfCɅX|I]氳auyթ^⹹֜no^rt\r8À͇#󮘢N	VȒ♆;ʣ*⒥V༄#ب9r \rxcⶃ(\raᨃ樸ja¡`g¸0焖̼°¿Q©x(ǫÀglհ{Ƨh`sW<Kj°'¿;)°Gnq\$¨p櫎Ɍ_ɤø¶^& ¯D¸ءb趞!EjPV¤' ⢁(=ςbr\"b¦݌¼\0¿̢tႜn>J¬ԣ1;üù¼֮ۈ¿4^s¨QÁp`֓fr`7«xª»E<lяㄉ8sþ¯'PT°øֺ拃¸°z_ʔ[>Ј:ϳ`³1.°;7󀁁[ј޾º6!¡*\$`²\0À栬øǠ݁@°ࡘ忌m>>\0ꌃǸ񈒓¸ή°/+½`;C£ո\0꽞*<Fö+냢q MÁþ;1ºK\nÀ:b3j1Ԭ:c>ᐙøh��ގ¾#Ԗ;㑴ֺܳ8േ:ޯ¨\0XH·¶«aþ®¸M1䜜挛YC£vN·\0+\0Ԥt#ø\$¬Ƙؠ!@*©l¦	F»dhdݽùFঘƘf󹁩=¦0¡ 4x\0004ED6KͲ䢣±\0򃮗N¨];qº4sj-ʽ-8½ꏆ\0斳Ǩû¹D§f5p4ਜ਼©J螖퓒'Ӕ[úùH^·NR FKw¼z¢ҠܐEºᧆ|!ȣ©��dbÁꗹxߜ0쭥ඟ,E퓄_�u尠ǂ/巺¨( إxRaºH¼Yùce5깤\0󖰌@2@Ґ֙ùfeyY٣MוºhِÅ֛¹ez\rv\\0Áeö\\¹cʃueNY`囖Ν9h姗~^Yqe±¦]qe_|6!޳ufծJ拻菷¸ºM{¶Yه©øjeƌC»¢S6\0DuasFL}º\$ȇਥMbȠƤ,0Buί웥т2ögxFљ{a¸n:i\rPjýeϱrȔr؏GýBY M+q疩Yd˙鏠0À,>6®fo0ù©o󠦘f¢䓹\0ÀV݌!«fl᝜6 ů릣1e\0>kbf露!ﵦ򼥤(r˛ùa&	ý¨ـޡ¡ұmBg=@Мr畻 \r޵phI 9bm\$BYˋÿħx磉@QEOǦm9®˰\"º硝t¨ꆋ¸®Ї珪 ťÿ\0>%ւ\$醯rN&s9¿f£4繙g侪Mùfwy觗y휜`X1y5xÿù^z,& kѦ¢閼¡À¦1x珁6𗂠\n»&xٯgg{r?緛ü-°½®|t䐳±ȍ}gHgK¢9¿¿¨õJÀ<C C° 17g÷喝!0H⭓cdy´fÿ¡DA;9T梿®0¬Ĝ0ưؠù! 6^㮸S²?Ƃ؅¦E(P­Έ .悚 5Ĩ醈EPJv .¢+\$絍>P+µ?~¡g6\r³öh¢¼p«z(膗ل`¨±\"y¯񏺐FadŬ6:ù¡fީ\0옔ݘ{ᥢ°ବ瞊ַf >y͆˵`-\rژᜰ­hr\rβ£8i\"_ډ££¼9¡CI¹fXˈ2¦\"ͅ¢ øh¢L~\"ö%V:!%xy詂zygvxڝƽqgăZi企`ǫ _úg貺٣¾úª¨­6PAʀ\$¶=9¢ùͨ¢|p ÿ¢阭衢.ø!þ¶üi秞øکˢ8zVC̹öZ\"椘(ă¥¹°9蕩û¥!DgU\0êÿ㿿`ǰ4ㆌTo@B¤§úNa{Úr纜n̟E»8æ&=ꅨ*Z:\n?¨g¢茊£h¢õ. Nþ5(ShѴi2֪cfý@ў7¦z\"ჼֺrP.ǀʌ8T'¿¸k¢ߺ(¹q2&ƅD±2~ÿ¿رþ¬ùû҂v£©¼8ÿ© @ú鞘=X`ªqZºБ«֮`9jø5^¹倧«¸΂n¼qv±ᝨ3±ڇ芨I6𪪚dT±ڂ\\ 3¢,Ϩ髢3ú(볬P҃uVϼ\0阮U⫻¢̊Q¶㠩. ډ:J\r1ꮈ삉\r\0ɬh@¼?ґN±\nsh®圢뒲;¦r~7O§\$ ú(㵘¤RŨƉ芽jؗFYF ܔ£«~x޾©f º\"ㆶۓo단ººº#ܡҨõ¶®P˼㡨£-3麝/Gx®õ²nǩ@\"G?󤛬ZpքxX`v¦4XƵ󠻏[I¶7åXc	¡b碽ڪ_¾¥9ᵱti¦6f»°¸ݘٞ5ÿû砛Fƹ㩑±©pX'ø2¡r®0Ɔº邟§D,#G땲̘≏蜲l(£ 챣¦¨=Ё¸a쩳-8dbSþûõ4~��;°­0ඟǢ黪޺R您ó3z믌ÀüN𞄏`Ƌ+򦄭 4<ø^ay°¬	}r°⹴õ㡻¸k&4@Á?~ԤţE´­@LS@麞qqN¦°</Hj^sC⠨泛bgGy¹¤֞\nȎ󜮺G¶N}¼c\nխ¤ +£ｆpٱºNµTB[dÀÿ¶¶Ћ¢¾ܹ񠛳nگj;jěwhصc9p̡[y4«¨¶05͋N߁+ο·РXda፦/zn*öPÀꁸ#t퇨µ¸~๗VⲾ=¸#ٹn)¨܉;j:õ°J᫄C¸!>xù5£==¦2». 㼿'¨̧;üڶ½ù«¸®÷Θ냁λ:SA	º&Л£me꒣n±뺻ª˵¦ğ<º6ma=Y.神Àźg¶Ծɨù°л«I߻xś鄒I¡J\0÷~ºaY®훺T\\`햜nƾP)麊¾©潼񰑀ݠ[¶{rʉµDBvＩ-¹E渘K;^n»{곽庎h;ڲÁ¨ƀp瑴6ú»罘9§9¡¥ö֘¨Q~ۛiA@D j¥ѯzLV÷ѳ~ù	8B?⣌F}F¾Td­뻡Х±úcFŀg7Η۪ 6ý#.E£¼ဖ£¥𓣮J3¥ö5»¯Kɥ󊙧¸;¤n5¾¾:ySC۶oս.{񰐉d\\0뿗\0!)𓧚û¼腛gỠ+»\0üY Ntbp+Àcøþ£\0©B=\"ùcT񝺂±Á¤úc𯌈þ¸PI܈D¸V0ʇ!ROlON~aFþ|%ɟº³¸¬򩏹¿	W쯴ûQ𷨈:ٟl鰨@:«Àօ8&[Àn繆,æ倇ºJTöw°9½(þ<黃ƐO\r񉥠ùڂ\$m/HnP\$o^®U¡̜"»¿㻄<.n¥q8\r՜0;³n£Ğԛ𧡟+Ξ³3¢¼n{Ä\$7¬,Ez7\0l!{鸷ᶸ҂°.s8PA¹Fx۲𗄓��¹1̅¸p+@ؤԑ޹OP5¼lK¯¾·¾\\m溸Ďsq» Q�ÿ܉!»¶庎¼7¾o¿EǆҺq֠5?G¡HO®⏆\$ül¾+⏖,򜜲;㧰¾¤~΁č錳黈`7|ÿĂĠ벧°Ji\rc+¢|#+<&қ¹<W,þ¢»^򐰦nhХ%d¶欨ϜܛCi¶zXÑAÿ'D;Ɏ¡Ek£ʆ¬@©B򷨀.¾\n99AꯨN森kN¾d`£Ђp`²°%2ö¦½3Hˢ2&¨< 9¤R(򀇂tᔈ¬	ຑ֧נo򀛋>4?ԜrZ̷ʓ䗴`ºȐ鍆µ³N񟩓-IõȬ÷0(S¨rط,ü¹Х˓Kʐr͌'-2Hlo-ÁU򡋢_'W#'/üɈ֟¤®j6̉¡¡Ʉȫ¶\0鄼ںj1¤EQTܔ­ƲÁBcm�㍈g٫:w6ͯh@1ŉ:¤Áɾ2󰲒L/΁wÿ:򅑓θK<ퟰ�<þJ­76Ӏs׮̲sZ󟯜$÷AsEyϜಚr:w?Չ!Ͽ³᪇КM͹»՝\0ρ1?ARͦ%з>֍ǁRr}s週r)\\t-8=³ö͋ЎUýˬWOCsՆУw½5®ᯅRlM*¯D³类ї>]πgK¤²V¹\nܜ\蜓s܇8͹seͧ9­soξ 쳷4x̇񦀗І܄­ö9Ί6¬\0	@.©²@´9\0C;K��ӊ𓛜٥ϵ<\\û`򣻓¤E£>ÿyÁJ=lü-7þК46¨uC5P玩´RVв桂ܡнʳlVøҡNxû`մ?U۷(HP}jV؊뺎QJ÷S¸±s-gQ!a¥V؟SwRýOõ3amZXwZͯ'ݷa­֏دZµõ!م[\n<��O¥Ҷ'ǅOmo÷[דa=Qº侂:õTМnµ¨眰=ýmׅjúATÒŢu(ȉד´躥ו\$v¾Wõוµðuœ¿\\V8اv眜õק!Mж¦uŖ_µ&֩s¿\\CÿRVM¢]tXT7\\UoTטo_ԯݛS?aԬȓحLutZGeǖաi`	}XZi}QyW[i­TöYo¦ (ZE\\¨}nٍifڋُWפѥTýpu3u͔ýf5)vۗ]ՕR3VEY]¥X¸\n·^½§VqS½Sý}X驇fڶ>­Sýv»JMQvڕԙ\\g]´QYEΝµ#1Vÿl5U؅K]Չ\0³؝SýU?\\ºBwSU7´խZ½V5\\õ¹Wfý§[¥eUrõ{G\\µýUµڬɶW[]xöVת5mTjݾu7؜0ûV¦Uµاtý°w?msݕԉ۵V݃vݏq}ٶ᝵-Uq՝ݗc]ڗݘõ]Tt:�Mk¶e]-p}^ԉ[©XD㩺噝¿VdõÀýO]	seNõ£ܟZ¯WYڛմȖ?򳈞ǵߍö񝙠лt^w£d²:qTL@@>]Áj\rFݱvµݭLv´GKwi􌷉PMoùǹMgv½ÿø[§Uss¦~	赅w:B⁈юEù{䡛-ԃdýo\0´}&ދ­hXՎA5µ%٣fzLֈٵd­ Y_%v´ә!mҒ]֫ؒ̘%ü񖟲þ彂©>E [#^}öhYFۗa·߆>{¡gS¶𞏰[솷¦τa붑n慎´À¶x9«¥8Lꉣ«Na=SʀúbPk¦.ᎲøHùl\0ú:న2#玘;¼�øO}9ik]	&®{õ ø«Վٲ|a·&󇣔ǿ忞Q½¥ª±̮Χ¨)ɱµoفǸ:馮\0¶5q\0JЌ½邶4hy3®ޢ«¹a®ރùIzÁO񄦯®\"ᶹB»ʳ{ª3ƥ5r(m؈¡Ǹ.7rҢ%Áü^ eM»¢2®\0x½!b}.®♃6\$qSϜ"^|xE䈸a㾑¼À똇¡59'TR	ã9ģ藢1ߡсΔP�؏h6'ޯ򭠖˰µ¾T(\nn\r˅屏ԞRUg۩Ⱦ縨Pe#*¤⫒T<<>b;\0ÁgL½.<k©Zvጏø¯󺳶Ƹ~¬𹷀Y¸ꜷw¨ᏇdnҾ¤<úE鳈¦wSۆ@¾¡뮠o��񺱾Һ¿z㉥ힽ豥1ݘz÷\0f=عc㊤g¹{鞾np\0±ͨΑ:H醂n6F膂¯r痽öヾM.1~@3ºG�8÷q<S��Y8QP⻠L[ֱz瘛«Pǭ莠<{_-ٮ¥dO¸ùd-7䴝NÁ�º·繆¨Qø3º{IcP\$§»ºhû¾<R yy쿞򝇒þ:n㿀µ��ÿ;Ah!唾Á&儓»+>ퟰ�ۻMÁˌމ;þÑ￶S⮊·N¸ڌ=#񛫫񳱠üTü#+쮻;·r,ǂ½𦏆X|#\rü# \nüD>¨|VüS񏿟eϗ~J㭹9ᾜnsƻS|r],~ÿ˹񸩿 µqω?\"|w񦸿%|j\0rE򬫓nü¡�øqƕȤ8B.û񇙱«Ѽ³\"߯|ƒ´؃]򼈌¸­·EüϜ莲lü̕Ɯx֋I°÷ϒ Ic󿅸.|\$8D¹F¨݌PՋƲ3��¾¥xUσ/䣳җ¿A{¹ÀлþeüڑÿӦ׋¶醜¾ÿմܲpýU\n畟Wlo­Y⻿��㠝'־ýsկ|¼oￗ೧Àrü}ö;ڿ[ʆnΛ¹ûÿº¿O퍷¯ۛɟ£ؼq¾µq(ϐ_l☒qsN÷y򻱄畻iÀg¿tŎ:ÿý别ՙ§qk¿�{÷߿zý¿÷Ϟû걍ȗ߯ý샧Ԓjú㣸y񟄽㸧ߟgkwɢf8¼VcԷfĀY³嫏Kx񅽞gKAkþT,95rd㫹G债홯񾛒ुAńw柞µú½巹ߥଅ£%· {½m�%_þmúq֋˨_ þ%«!þEú¼iø~ù²h ú~»Cª߭~§ù¨%­µ矨þٺ忷rLkD«y̺𾔿p1O!?¿®v̜\櫓Pm©\"¸̼û¯úE©6 䅟V𳥎񚄺k¦9³zɋªߐ~ʃ/줕º¬顑>ÿ O£厭谳r砆úlҺe;¤M㟷ºϽ_a ´!~C»¼fú偼b}3 K¼føܭ. 	٤}.©þ»DX	i5¿|ú?ퟃ�0õ±?￻ø?£ޅ@ÿÕ£½fu~a^خû᪹±Q;q¹̠þ)sS½,\"G\nu%ʇU­Yl\nӫB؄Iʸ6VCcO\0֘`}.x©-Nᇀ~º蜔ÿG烟ü'üĘdۊ÷ƹ1zlὃ¦f÷gõ·ùAB aõ!þM\\<gʃýz4ƿ윀/³ރ܃섀õ	¯Qq÷)¤ûx䑁/î7inD±#=À *79c²ˑd2(¶ .ÀVÀ3µ¿ùڜ$g`A᧋rl|øm²¶b§/¯qE²Ճ´!bU@¿9i⻰pʏd�פ=𱹁yx°x	=v=ø®(v±דּ_³Bo򍉂㖁#˙\r n񮈜\# ۦPXе-3&«	½J&,Fʨ9¶v´0Á&@khZ򹶄gԋz ÁÁ㦨i=¡s9T񂠥T>g³뤞tFûö2b&:¾𜰐P¡÷B-¹Qˁº8~ԌSƍșڷcgЎ𔃨'򦨑³М$¨.E«§VLÀ°·AýI¼ゃߌ񆅹¼r⦇㪧ۜrܙ㰧¶뙔뎱P`1dԢ��r¦4⁚=6@FüÁ¼ȠF±̱=¿ɂ6ρ¾¾嗎¥AV߉虚(\$ΖA/¦·ؚõ¦;¦­盚?¾gf^	¬\n覰KO³Ʈ{]õЛg˛θ壬ґ²Ϸ޽³ÿ\nȓ7LЗ¶t:ґ ³hF°VO\r³芺)b(\"OB̭°	o؟\$]TSHΚ^½õKÿ©䈷𜜛A9('ҙcۑ⭜ࢰؙĠKࣥвsrBx\n誐Baƺ6o\ry&tX1p'^M·¹<⃧¹`̴øGHõzd?gX.@,7wï۞:+TiUX16ӌ¸ܳ:\rL趇Á±fr\r`㴠67~g°xgH9㊀¿O=-\$𴄿r٪4½¨¡Oû躍z¦§{ȾD`󨒄в1Fܵ£ШD򍓊;¥º½񆓦¡͌©Ԛ­¾U>Ή6c݄򛟸@\r//¸¶ԕý󟇖HÀ\n7z댠¶ü7򡮠ɻ[9D¢'ü¿콂ÿOR􏝟¸B#s¼]z!(DÀŀL^ý	û³x£݀oᗿuO䯁¥D¸Ϝ!e`\na³k>´0`ᝁ̭* 8EZ6=f̩%¡ݑף㛰K=£򒤜F\rʜh蹎򛶪vᜲÁ䑤@#߸퉁ªAh*㌜$°À±AÀA\\¢úӥÁ*	ħp\r*==8윤W [±Jx0y񛚃+&YوA~A\n,\\(֬p¤!F¶ꚼ6SئIP`6Xzü+�fޜr¾ϊ£ތi땄s㫒&5¼启rEÀ£M^\$R(RQ̒Ew3􌬈*m\0Bq¬a¯r誌Bª¥Q¹z6~l˹B\rI®Gø昙¸XVbs¡mB·Hª׳󣮟K眤p歺8Nj:¡-#¢F剜0aiBƳ\\)μ.!Ɲ\\ߛNҕbIw8§͹tøPjW䨠¶y\0쓝&0i?¡ÌҔ:«Ia)=C,a&ºMapƃ\$݉IFc攭眰!Yĸa)~¯C1PҚL3T¸jݞC\0yҘ¤`\\Ɨ¼\\t\$¤2µ\n櫡¤\0aKb譎\n]Àº?I\rЈヮKs%ώ©𗡋^°ϔ9CL/=%ۨõhɆ:?&Pþ셙Ҿ5¢풮[GْץVࡻ*��ù­էJ¸]º*鷤®]ނ5^󖢒OQ>%­s{½ԅ畫;엶³ֺi®ýÀ*»ùRn쑇9Ѕ°¢ޛ,(u*°±Ւ×Xճ«Ҍ¦¦:µ5뻔橰R¶¦͎úȶKبR³ݍ¢Ǣ𮔩©_{Ն<<3ª:%ºوV뙓\n᥌+{o.>Z(´Qk¢ւN«!ì,:rH}nRҕNkI		ª[򴌫ӧgΎ֤;mYҳg%񋹖~-J_³񧲭©˜\ɮ£Q\n®!õt«\\UY-tZn¨¡d:Bµ°ʽܪ흧)t²¥wÁùɫ[BUm*ڲ4ؖժyv¢¶ÁvZÀչ+GH·嚮°P|\nT¥ %#\\·AX\0}5b+wr«Xwܲ1uùץCg=I­򶠟cre˰`..<·간h+H̝^\\j­yF򝥛ʝ¹Bʜ0ɲū> %Zx¹ 楃.ªìĠVn­1KS¾¥Ϋ\rõ瘼´õ[̻õ6H	U@©D:޻Mj	Εۊ?ýª]ڤ؈bA+ԅG£\0thxbþƌ`ŀ64MޛĴY#ºhfD=eط=´c+H񡡺.%ü^\$򄚲AzjÿfLl7o¬ý°ۜ0¨-䜚³Ed䞉yz'V ­Ӟ¯W´	Zö§K+°d(A̦yސ?xR^hõ¸'栁\0¯:p\rd(V±ܝ½döt	SHȟ¹]r¢rʃHY	X_º/fݍ½ 4 7eڶD³{,ѨþꝘ<<Z^´ݪ\"	鵜n+ƀMY9A(<Pl¤lp	,>Ѐ¤{E9ܦǨh{(ý±Agg8 (@ުTûn˧Z㆙ŰÁJÁ³x¦ü¼@ic¶Ջ��'oJ0MnĀ�§³\r'\0Ցø\rqц贘½°)ý½cL§þ_ÀoJڽ5o¨࠼6m¾}Qª£ᴑ뇢·µ[úx«m( ݦµ@仂+򘥮ڎŦ|IΚеRд8 {	`ø讧k`u»r`蜗㸱`\"´)fI\n©Ի򸚪͞g𾡚AΈ衪¼ĥĦT \\¯\r3EjjꕢFXZ	⏁y櫈 ؘdퟶ�Q±´ᎀþ0𤔌ü²¨°ﻡút¨	ǺkÀ`@\0001\0nø爸À\04\0g&.\0Àú\0O(³ȃP@\r¢腄\0l\0pX» \r⦅䋇8Àx»¥@Ŕ֜0À¤^»±z@Eퟮ�0ޮ¤^¨¸Qq\"酠晤_p&⿀3\0mZ.PpܲEϋ÷s񶜢酡痚0´`ø¿wⱆ,󗼁¼_¼`\rcŢö/ԝx¸q3\0qήp±Ⱌ0002_쳩đ¢ⅆ\0aޱ䢘ÀѷJ \0l\0α,`º1y\09#?0T^؇q£\$F6/\$d¨¸FDyJ0b»\0	ªƗ¾\0殜c¸{c E؜0s3l]@\rbùF\"\0²��\"񀷋µίÜ0±¢腓a	^04e¨ºQ{c<őɗj/_Áѐc\0001µ*28BAأ\0000xƔiؾ1£F50ljH¸\"醂30\\_¾q\0Ʀ¡T³l_0т£BEČ#3인ұsƽӘ64_XÀ1\0ƽ񗠙d`øנ\r£SƟJMV/f±­1\0005I6tf°㴆ªÁ¶34fƑ う-ߘ6d±\"÷4k½\$h¨± #EŌú\0ֶ¤_01c@Fᚪ/d]Xב£#G\n÷5¬g¹qㅆ\nm\\nű½£YFv1/4`ø౽㓀4=⸄bױ|À\00043ĭXÁ1£eö\0Ś\\蠑cIƉ·.7ü\\x֠\"톂\0i^3ퟎ�±ÀƜ"Ev4l_Ȉq®\$F񋱗\oȾ \r#UE䍩^9ütÁ¹¢\0޳|rȄ1¿\0ƶù69l^x¹ѼPF-]\n0Զ⑹\"퇒³2,sxÁQq#F+\0ٯDiȫq}£ÀǸ[6,jø»\0cmǯךN5¼ehѶ£«GLH<T_Б®£?Fɋɝ..\$føۑy㚅÷C2ܬ¨۱s#؅錇D³lohّ²£j ²8ԥ¸űԢퟚ�õƹܠxӱ¨£§CƷĨxՑ٣ƅ»ú7^xͱퟯ�hø	,uة±ぇ)ڻlu#¹þ<ükۑ�Ɯ\0sR.¬w¸ֱ#zƾw2|x(ڑ÷Ⱌ0001':ܶ\0001㢇挿¦?|`ø򑿣Ƴ۠.2¨X܀#G¨8Kƀ<z¾1£ƹ\"9|jґУ	G¤/涜qޑöGÁsַù/\0001büǟ횶:|8ڑڣ~F»W4駘̒#<F\rµ 2üXÁQ̣ÿFvkxұڣ΅Ǝ¦@¬rhܑÀ㪆헚;¬fȥrc¿y!\r	䟸뱿\"üH1ϗ¶0Tw虲c\rF1 \n8dX»r㐆Ԍ§޲Db轱{d4HrA<~ș1±dBHI[J?¼¸Œ£qǾkº0Դؘ҃#F\r#0\\h¨r¤Gȿ홒Ettب�ȕ¿!ֽD_貈cNǜ0yֶaّ񫤠Fg硶1̱؈1أKǇ»․e跑³cGo󜜮/¬øƲ㈅㋁\"3t`©񶣣Hµ<ܣøӱ⼆?Tb蹱°d)Ǐ© r0ø̱qc¿Eø㘾3\$tyQңɄECl`9)¤VFHMJ7føöĜ$HHQ ;üri7#F³-F¤HƑ÷#\0G·!1䞈þ&4¤vG&û7ԧ蠱\$\0G\rr/Ĥ٘R¤(ƣs6@¤٧RAぇ¬ȁù&¢¤ǧ\0k z=´|HٱɣŠɘ^J´]Àѳd¤Ǭ\$1¨ҼcqǦꊜ_øϑÁb燈QvJ´¸رޣH5¢F��ÀIc¬ț΀Բȏ¤vH奣¶3D¨ǲc<I\$M.dوr1c=F÷.4cղb釮!¦L|{Xב³£{I«NF��qscކݍ¿#þE¼a)ѣ¹GJ¬m¹.û\$=GhAN=¬sх¤E͑GþG\\a1򰤛H¡ÁF.tg8ꑃ¤[Ȳÿ¦Idn¸þ򸣆Fٜ֮T¨û񷀙F3Eº6riq¸㳆¼ֶĸºr㚆L=nFTүd Ǿ-ª3��2\$ý0= ⺁xcH˂I\"NP\$b¸ۑ񜤎F񠮄Ă摯但ꌇ%ª?䟨£ꉇ3\$O\$^x²T¢醱՛0¡𒒋̣Ȅ:򅤼i/2£XG8¬¹-ù\$Hɶ¥ֽd 褜Ǡù:lax䑺¢ퟦ�¢:엘⒊¤Ғ񔁙Ғ̭xꒊ#\nGG9!N¨䒻cIõӦ扬 青=£I\rù&j:䑸Òg#¸H᧎3_x¸²b¤H}£>7許ċُ\"&K<x؊2¡㧈¥\"6@db諱­e;ɩ!.ĝù/򑤗ʂm*f6,v©ɪʝ£ªL䁉(qµ£AI87d9Ttc􊔒ULXȲ%H¡I*z:̼IXqsᨂ󐭖BЅ䱔^(R¼»aq(~eѱ¯§ 9J蘕+-eq*nT୐>¡\$Ց«erα¡p\nŕ¼˜$es+£IºǢ«øeq:ߣ]cc®7r\nٝf,gYø³TC²%񉔽˜0²©\\*셗P桨:υ¥,&W򆰩ŝ¦˖xl²Mႄ3\0t\0¦/Iip񄂑'\0	k\$T¤¬F¤]fºͤM򈀝K\$¼ýH(@»(zµnWҤٟMݔ*º\0¦e٬F^H	W*BZPe½ŖӒ/dRRʅ\0Ku£,yH)¶\"SʘI'®¹Z=猌øR峎儒\nÀ'[k𭍶@;}R�²򳴌¬_驠wꂛ󀠻\n߄´nª¼ʓbBr¸l,\$v֭͝԰ÀՔH©ǅ\\¢ٳ*ȝ º喋.QtBºdb½@3¼S`a@¤Kª\\.«´྇fª)¬«¨﬿|&ӶKÀ£Z9.ݘ³+S⼀؜0Pʼ¢E򧥂/ʜ0V떞KĜ0\n-	:ˉSز)תû0j9TX垂ퟏ�\"兯±²,2Ƨ2˥ցP,¡x��СKꗪ´õ\"ʄ¢#TV²D¿õ1񗁯;ؕׯ9TH%V`WJ<9¯aeʰ K/V^/¨Q¤؜nB񄚜"9틆XүM~\$°5ߚ\$0d轌IU͒³2¼^X\n¼*ㅷI\nV3«+ΡÉiҒNˋKg0a°z*V©º#bJyMҦeõ⚖ V ¢`Ѕ򐕱˃.\rF²ª-jΦLUp§9s鹊+Q&1¨⒭¥Փ±gZª²	,.XryZ첰0¨Ϝ3¬2A1©ւeNû©¸ú²(?Al ޜ̚,N赥²Ϝ$|rù៥²񅃰5E}³\$¡܁X2«%ښªe \n\";<9a¾h㶥࡝úʬ8±઩u¯偪L¥¦¶±dR¿𰫸Áª+ޑm.ü,Gù«¦M®2奐dBꍝ¸,°S2Á²>Uժ따»4vl뾥2©򲤥ĵ˅Yg2nf=Àþ\$%󌙖Ffa쵩ꧥ̦Tƶᇤ͗g2ºW,[튘>)tʁ]ºR*º&Z·Ŷj2|¥\0 °(©p	깗 ̹uҪ��`n啜-lZn땡H9²禺L𚘢9VLϹyҐݢZ؟JhRgEfL©U²~`4͙禸)\$B±QR#ÕS꿔¥ˋõ,6i#ÀY¦,;C±r¬⩙&ǘªû]荜nw54­Kx\n*&©T£ӹ¦©+SлqNc·y󉗤¯ۜ0W5cԒɫ𦄫¶𕖲婬ꎔ£Kgª¾Կ µ¥|«gR¦¯hR´%K빕)Z#5䎬ֵk漻`재:ՌsC[MUB©6ldхѓJ¦°ªﱮl:ºùj¦ˌߖ¢\0®h㶠*)¥p/®ާ5\\<9´󖦅/ޫ®hTǕdjµ岍bx\n]R¹痪R MaUµ3=ׄµ`0³oȋ,Z¬³lÀŽȳ¦m¨월�􎙴խL哶ꜜtΙ¹򺗨L\ϥJ¶K噱7oѩ¤efM£oC»Y¡v慭NVô=Rљ¢sJ݉Ͷ¬¶*hԕ騮䦏-m鴉ߴ๤󁈱Mû|s¬U=ݚ́\$ڭ򩹏¾ö;ꮊp⼰û󑦸«§ªq,ԕ5sULù£8}ݬřª÷#ØH±ٝ쟉««¼9Uµ8�³I»´ªЏ±7ҫl䵽зf¹LY𬡎2ް󽦽	iꮱc,剹3ڄR©6r䘉̳b¦û͍Ƕ>lXY¿ûfýL)+ٓ,ى̪ùelʹU\"ed智\"Z癪ږ6ZD߅9°᥈΂Y9rmtㅜг'.M²[4¬^剷뗻M»wٵה͹¸ҳa¬¦v+70l͉ӓd%£̼ù3_<镬N²¦(v+7YRl΅Ӫ].մ©I³®)¼³=փN®T]۹'U^ӿ瓫¼½7¾XC®ũӨձ͗u¹9©E´ߙ²k猻¤Nh̬ÀSݱNXk;1[ҵӌgpVB¤ᥕ΅gs¬ ;­RlןN𔇸öw,s¯1͐xr늱ꉟ3¦¬(ª;񚚽	yӾ'{O	_´¾겔ªMg|Ή󹲥L癊󔦼O\rYnkܥuSNɶ9VkⓉ˳ǧ.̛v9zyd橡¦ȎЙ즳\$칍jd'6͔Q<͖ܧ)蓥竏§:ј¬Ꙫt¥¡ðu<±݊ɟ3¢]qM°Y:9X㵅S³¾gI«Ý*¿m䆄C빃ýv G߬ܒ@À֯¬jT=¨:e ۀ(\0_Vn©,?p	3ާΠ¸¨؂\r¬¼ö|\"ީ𒺧TnþP皤°\nӔ屬ۓf¸.YЄµQ A¼A,ZʚeS唛sEÀ윲úvT¬QZ©\"p󲉳s땁ϛ\0¾붚¸}®rٔ¥Ktf霐䦖9疮¸{¼¶^J矏¿ø©\n0%«NGګ*~lüD.»¦΋e¹6¢[,ԥÀ퟽�ɭ~쵕󺥪®RO;ú@	˨enb_¾%sK¿Ŝ딂ïYÿ濺ΙѰü¥Ì˗ª¦jrߕ󃃨φ 멡Bٱ愐v´£fwګɸ磍Ò2´2z4rúh;ңM@}\0|루MÜ0=ځ=塒঍-!6pʆ g[P4´̬󃚛5:\rµCt¨̓ u@ýۺ<韤ifЎu¼n[񡵸j{&9Ku FQlRiÀ(˃ ǁ䮙s4뜰Y ͻfB<Ի嘼R_I~6��MWTA흴÷e@J­eɐ|[ú¨r5*ÁÿOΠ킅t½)¤ꯥЭ\0Pªjm	us᧽ИBi^©ړ*¦zаYK.ù`[¯Yû2햅Ы|°XBхÁӁ(?З±.\$l¼³,掜X¶D獜n꒫j桏D ->_<¼¥Ջ֝ٜ0£ٕ¬¥Ásøh\\¡ea\\Ӛ\0ʶe䑙Yµ`¼¥´7U؜"e¡ǃYT챙zt:V9P_³aЕFԻ݀\0M¢´2eú눃鐳Z?¼圔'׈¬凤³}c¾Yüaõ脬叽?Qh8	𴰕QCM`º«󶦸,¢JeZ¾Z\"GWª¡uu\rվ49菋ýퟦ�¹͝V9ϼݖ´øZ뻖EOĘ;©ᑏЯࡧP$\n²RX@}!-Si򒪾¢qz։öꉔH.¡ԭ\nk\n \ndϮTº²>Мn ­?£E`²̵D+f?#z³IZü7T[¨Qs#ùD\$«ՏPù¢쉂	û3¾ך*¼:ݹYI²㈋³Ԉ®¬X«0儊!u7J¸m® YB}Eª°³¿简¢򲔒8Qù\n}'PõSⲉQ±ЅõẨ°\$§ŠRǩ^ᵨOP\0®aK½µõ��¬\$H.ùX뱔穐V®`­ڹ ¨.®Y18⚥UÁ`X繞´	𤧜\Lcj°IE N鍫ª¦6W¡D¦XB؉Z:|Ϥ:	E-P-ڦ΁迩ú𧎈*ӺԬÀ)Pµy|R°³Lhÿ.p¤§韪 QA @ ·?,Ƨꐙꖩtч<큐*꥜jVuQþ:2\0L¸?J맨ѬTPHL²ÁúE%¬\0ª¢yP(YJZ¥THŘ\r	Q4hOһ\\vVõ#倔Ww`õOҡſ«?ҊR2³򒽘õF󢝻ВI5TMjI빩,(ƤDv|tɩWy-¦]z¨ڥa,pQ6\$뉭g=%Sԗ#픐§ܐ¤ɩ«T&]ޑõX15jB8斏ӥ\n삥m yh*褼»°d猴ς·bd!0¤gRJ\\͠֍tÀ1R\n\n表܁ª.ö_¾üu򇫆¼ǻý*4θ)]À\\¡lܨm\"񞃑nT(*\0¬`𱈬@2	6h٪YÀcH_̚Ȧ𿰐a«7=KKde´÷H؀2\0/\062@b~ˠ·\0.\0¼v٩ !~ºJPĝTÁ½��µ¥󗂗ڏ{t¾¾\0005¦¾/ீ\r©ÁJ^퟇�ڡ!¶)8¦%KޘPP4ũ~ӔH᷐Ŵ¼ܭ\r+¦Lb¥/24)ӝ¦GKꙥ0e˩S1¦B¨	-0jfԄ隓¦wLΙĩꤠ頓¦Lº\r1ºh􈩜S ¦MJJʨt¾)¨ӫ?L¶e5nө|FHɍNõ5ꪔɩSHՌ崉=Tة´ӄՍn½6Zm@I@S`¦)'ªշf򺩟Sz¦x~OU1k¿¤õSF¦ýMOU4ªp��\0000¦옾76kѣxSl§'Kⷅ7\nlͣxSu§LR77stߣxS}§GM78*qtӣxS§OM\"78ªu��ӏ\0¿9úr)˓r¦2ý; ��ӷ§Njm/x穕ӿ¦sNڞ:jy4¿©Ӫ§gO:1ý=\ncTö©§Sͧ;껱¥©§/ORH\r=ʴT��ݧ¥O¤\\zx4÷©S򧋍þ>j|TýiºS¶³O¼~��lӺ¨Oö}tüș§ߏzԻ*%§]PPüvU\"úӝ§¯K⠭@\noõjӈ¨;P¡>1£鿆d¨P.5Bظª\rԌ¨3uB¹<µL#Լ¨QPECʁu*\nś¨yPN¡´lªõ\r6ӳ¨?Kú¢mBZijӈ¨O2¢}1Jµ雔M¨_Mþ¢mDꦔK¨Ǒ6¡­Fzv´ퟯ�¹§鑪廪µj)Ԫ¨ޘ¾£mEʌª9Fd¨őv5eG؉µd¤Ԅ¨EM\0+優\"j)SD©QҤpZfµ鿆§mR&¢ýHUہ%§{Rv0m0z¥䧟Lƥ@ú'֔©ER¶?eJ÷>鸔¨ݍ¥µIú²ªYT¦ےõ/¥Bʕ.ꕔ»©YRΡL:jNԅ©R¡݌ú5ji&,OꦭJDߵ,㹔À©­Q¦©͈蕱ꨔf©NȁґޥQ'©η¾§Lih¸²\rcjԝSz§u\0n㆔º©g¶§؇9ՀcՄ\rT§%LŕAªfT­MT9uQ\nթ¢畐©µSº¨uD:±jU	©­ƨPږq*EڪKSb¥l\\ڤµFªԅªGTz§gJ¤µHªSFª	\"©½Q:1ꛕ©;©½RꦵL*~EߪoTҦ\\z ª¥պ©­⪝Sꕱª¥ՂªU¨^J©uR*kEõª	ªýT꜑tꯕR©g2ªýUj«µV\$ŕ_ª¹S³mPHƕ\\ª±Tü[Uʫ5Jhٵ\\ªµUpªٙ¢«V𷡟*ӟ«¬=R>\0I*¼¥��«혺hU8jɔ拚¬\\:թjǔ·«8±	嗚³Ub򊸫R­=Y³UVU«R¬¤\\:խj˔ѫiV.¦¥[z´±Ҫ-«{T²­Śªuojו»«3 ¡͛ª±վª؈«E ­%\\º±µh#bՅ©WZ®-\\º¸õCꦕ«»W>¨­]ںg4#¶Հ«KTr®횊¤wj㕜$«z¬-Rj½õtjЕ*«ߗ¬tp\n¾4õퟑ�NMº´²ªxUþX32[x򕿫®˜$B°US*½õqꛕͪqXZ®}Sʂոꁕ@¬-W\n5ݘZ¨Յª㕊«U2±=\\úª뎆+«񖂰]XXÁUª얰«¬-VJ¹²+֯«ɗ±͚ʮ5sj¹ք«U޲%b؉µªÁǷ«V²%Y^u@d¤բWЦŲRk&񙒬\\¤ŒRk֙©cVƏ-\\	kd򓡋oX²¥Kʍ/빖]˖ªO-U<µ@݉嬥Vγ[õ«6U¹­½eϵo«4TݭYⰍeHƕ¤ª\rʍ9«¢¬6ਲ਼®+7ιbӲI §|ć\0:Fzퟦ�n§|ªs<°R½%JӋԝ¦õF赳õ­j¢Σ¹Y®µZ¾^<5X·IJ򅍠׮O\\£B&¶rõsŧQuz¨¢x¼幨	¬T®¤Vw͖J5¸g	Ͽv¨qF4³ӝ·»­նªzjù蓕OV¿\rεʽʒfT͚𯶹´³	֫pKaXU9m²³­\nekMoõ\nhTޕꦦV ®¬vý:®іs®\\p>ÁҌӺ¦)񭏽nk}j¥Sõ«&·֮ª~µ¤y©ҥ¬ܚߚֵ񩪘®tחVR¢Vµ½sµrʺ+aͯ­,!TýlUϕުn­5¾¶\\𕷤v+M\\®)]B¶|񊫕´¦l;4¯5öpLֹӵئ7Liý[~bmtɦSe\"»°Bº½v©´d瀍§SÁ4)ؒZ»\$)®񵩣!µ´¢½Όꮒ\\Rù*ߓD¦η\$9洓Á\nᔇf򐔛Ʈʸ´ߚ㪦	Kʹ­D·Vyû¹5͵ȦJב\\µC¹\$ٗ,¯M\\º»��5¬듒®k^Vճ赮k¡ֻ¯M^굽{Àu°§ϤwFQğJ鈻gWN¡k8þº͝􊉫¸»§¥1brĭù˕ثӖܘ]dL窭´YTζ®綖twy˕ޫ򗫭૶x=5ਕ»²��ʁ񋷸\"c|еfUÿþ؜0ҧ5ުȩ}Pkn̚Rl¾f٪૲ћ£¢>c4ƗW+TýDo®ү ǷqSX¨ݢ}}Ũnµ&<Ͽ/3º-áh°©qný§	õp%)SɹP\rۍµÿm-Ϧ5°º[\\=̔པøy )ý砗Yd竘¤46#Y>¥3ԝנm©ú\n09h;²4°°ëߡe\nȃİȞ!ʎżѩ@��}\$¦֝ߛýAFúÑ²0Nö R㉺°þӄ詜¥ü¬U¬?½¡b5�׭\0Gýط{¶I £)w-4;p8ؤ;@\r\n\r­ڎ5ƅF\\ӹhgPE il0¦똦%)\n،kȗ^Ʋ¢ݼ5Fؖ줉I<񆆪³bM¬d'ቶƲD£⒮Bma²ЃҶýOY񘧧¼8¥璚Vؐ%mf¬ԥ倓F¡-¥,Ƀ\nýaù¤FǷf􃳄¹笊0G乑ؚ²\n	1;J햱Á\"iP񂈹´C¬̻²tzӉ㑖;l4␈ҡJmLX²+lᘪõ{¸¬\"↜n̖ÁÀě(ڜ$Y\0�\݆6D9B´H±d%¦Ӯ1ہ6f ќ"ʒTJ֙ڠ/²>ʃ=Ďc쨱¼²?e!ýk*±3l~Òөÿ«,ׁz/d˨¦Mo셭´ڲnќ"ɽ͂놺Tr}eٌ{MÀaCԷfiTºõ˯6W¢©P²윖̸Fa`ݬ¾5³󩹍f2V]['}cn4]h·향«¦Zŧ\r2Ɉ½XllGa`(­ۈ(Ĳ\0蕆ĽПölOùf&fıc8섚{¼Q恜	S6öp\0䙂憹\röq3m&*fλ̰򶲞cϳ¨`ɵ&zn^ڱù;DȨS㤯j^㽿L'g5Ħ줇Ef&񞏼\nK 6?bX*¬.fψEû~&9١礌k@v\"F¬Gx\\齽E7XP2[:Á¶\0׎࡚ X~¦½7·͢X64²ɨÜ";B윮޽XךѨy¹̦DֈۂZ¼l\nKC헚pؕĠmS®	2Е¢;GՑ8¶´{ѭ±WBm쓸\$Fø\rଦBY2\r´¨mAő°wĚضؒВ¿Хd´݂ڟ²T��``BaНه´գᘋö\r¶\0­اN¼ù\\´¾;NਠĚs^\n̵§俖­ѲVwzĕ F\"\0T-±,^΁\0ζ負/晠󂏠EW/\0¼򖒄¾˴;\"십NZ½ЍcλRVNeZ¦wj6럯a¶÷ÿ٧»KV®lN?±êt2­¶T/[펤û±j|0t% #°❑\0��ø5F<´ X@\nӢÁ핋ZF\\-m¼³cd2İ5Gºv'Bߧ¢7{k*'L܁ªZ|I±k´\n-.C¢6¼«¹ǫ-¯ׅ©Sں°÷kф]¯˟\$ګG򗠓[^­­z]kё8\\ö¿F|§¢?BؕÁ^ϕB¨̎|񙫀­·B¯¥zP鞘W/R?[!bBṓkÀѠ'	(㥺xfಏ7\r_�¶Maꜰ#±䷼鑦\0Ɂ@)µ􆀎1򫮆LA[PtÀ\0ý`6՜\e¶zxҚS݀vՈπU:ڱ¿T¼Áϗ>fۜnqlūK(|¶\\´ѠGU؋³ƀ(𪉩S%F¨\rR\$©C¶¶LНĶ;ɤµ센g뭜$m?ölhʝ3?PªY\0");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0!©˭M񌪩¾oú¯) q¡eµ򌋅\0;";break;case"cross.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0#©˭#\naֆo~yî_waᱧ±J׶]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0 ©˭MQN\nｓ��8yaŶ®\0ǲ\0;";break;case"down.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0 ©˭M񌪩¾[Wþ\\¢ǌ&ٜƶ\0ǲ\0;";break;case"arrow.gif":echo"GIF89a\0\n\0\0\0ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0i±ªӲ޻\0\0;";break;}}exit;}if($_GET["script"]=="version"){$ld=file_open_lock(get_temp_dir()."/adminer.version");if($ld)file_write_unlock($ld,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$g,$m,$ic,$qc,$_c,$n,$nd,$td,$ba,$Td,$y,$ca,$me,$pf,$bg,$Gh,$yd,$ni,$ti,$U,$Hi,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Of=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Of[]=true;call_user_func_array('session_set_cookie_params',$Of);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Yc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($si,$ef=null){if(is_array($si)){$eg=($ef==1?0:1);$si=$si[$eg];}$si=str_replace("%d","%s",$si);$ef=format_number($ef);return
sprintf($si,$ef);}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$eg=array_search("SQL",$b->operators);if($eg!==false)unset($b->operators[$eg]);}function
dsn($nc,$V,$F,$xf=array()){$xf[PDO::ATTR_ERRMODE]=PDO::ERRMODE_SILENT;$xf[PDO::ATTR_STATEMENT_CLASS]=array('Min_PDOStatement');try{$this->pdo=new
PDO($nc,$V,$F,$xf);}catch(Exception$Fc){auth_error(h($Fc->getMessage()));}$this->server_info=@$this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);}function
quote($P){return$this->pdo->quote($P);}function
query($G,$Bi=false){$H=$this->pdo->query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(PDO::FETCH_ASSOC);}function
fetch_row(){return$this->fetch(PDO::FETCH_NUM);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$ic=array();function
add_driver($u,$D){global$ic;$ic[$u]=$D;}class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($Q,$L,$Z,$qd,$zf=array(),$_=1,$E=0,$mg=false){global$b,$y;$ae=(count($qd)<count($L));$G=$b->selectQueryBuild($L,$Z,$qd,$zf,$_,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$_!=""&&$qd&&$ae&&$y=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($qd&&$ae?"\nGROUP BY ".implode(", ",$qd):"").($zf?"\nORDER BY ".implode(", ",$zf):""),($_!=""?+$_:null),($E?$_*$E:0),"\n");$Ch=microtime(true);$I=$this->_conn->query($G);if($mg)echo$b->selectQuery($G,$Ch,!$I);return$I;}function
delete($Q,$wg,$_=0){$G="FROM ".table($Q);return
queries("DELETE".($_?limit1($Q,$G,$wg):" $G$wg"));}function
update($Q,$N,$wg,$_=0,$hh="\n"){$Ti=array();foreach($N
as$z=>$X)$Ti[]="$z = $X";$G=table($Q)." SET$hh".implode(",$hh",$Ti);return
queries("UPDATE".($_?limit1($Q,$G,$wg,$hh):" $G$wg"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$K,$kg){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$ei){}function
convertSearch($v,$X,$o){return$v;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($Xg){return
q($Xg);}function
warnings(){return'';}function
tableHelp($D){}}$ic["sqlite"]="SQLite 3";$ic["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Wi=$this->_link->version();$this->server_info=$Wi["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$T=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($G,$Bi=false){$Pe=($Bi?"unbufferedQuery":"query");$H=@$this->_link->$Pe($G,SQLITE_BOTH,$n);$this->error="";if(!$H){$this->error=$n;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$z=>$X)$I[idf_unescape($z)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$D=$this->_result->fieldName($this->_offset++);$Zf='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Zf\\.)?$Zf\$~",$D,$C)){$Q=($C[3]!=""?$C[3]:idf_unescape($C[2]));$D=($C[5]!=""?$C[5]:idf_unescape($C[4]));}return(object)array("name"=>$D,"orgname"=>$D,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$kg){$Ti=array();foreach($K
as$N)$Ti[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Ti));}function
tableHelp($D){if($D=="sqlite_sequence")return"fileformat2.html#seqtab";if($D=="sqlite_master")return"fileformat2.html#$D";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$_,$hf=0,$hh=" "){return" $G$Z".($_!==null?$hh."LIMIT $_".($hf?" OFFSET $hf":""):"");}function
limit1($Q,$G,$Z,$hh="\n"){global$g;return(preg_match('~^INTO~',$G)||$g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$hh):" $G WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$hh."LIMIT 1)");}function
db_collation($l,$lb){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($D=""){global$g;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$J){$J["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($D!=""?$I[$D]:$I);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$g;$I=array();$kg="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$J){$D=$J["name"];$T=strtolower($J["type"]);$Wb=$J["dflt_value"];$I[$D]=array("field"=>$D,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Wb,$C)?str_replace("''","'",$C[1]):($Wb=="NULL"?null:$Wb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($kg!="")$I[$kg]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$I[$D]["auto_increment"]=true;$kg=$D;}}$yh=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$yh,$Ce,PREG_SET_ORDER);foreach($Ce
as$C){$D=str_replace('""','"',preg_replace('~^"|"$~','',$C[1]));if($I[$D])$I[$D]["collation"]=trim($C[3],"'");}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$yh=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$yh,$C)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$C[1],$Ce,PREG_SET_ORDER);foreach($Ce
as$C){$I[""]["columns"][]=idf_unescape($C[2]).$C[4];$I[""]["descs"][]=(preg_match('~DESC~i',$C[5])?'1':null);}}if(!$I){foreach(fields($Q)as$D=>$o){if($o["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($D),"lengths"=>array(),"descs"=>array(null));}}$Ah=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$h);foreach(get_rows("PRAGMA index_list(".table($Q).")",$h)as$J){$D=$J["name"];$w=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$w["lengths"]=array();$w["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($D).")",$h)as$Wg){$w["columns"][]=$Wg["name"];$w["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($D).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Ah[$D],$Gg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Gg[2],$Ce);foreach($Ce[2]as$z=>$X){if($X)$w["descs"][$z]='1';}}if(!$I[""]||$w["type"]!="UNIQUE"||$w["columns"]!=$I[""]["columns"]||$w["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$D))$I[$D]=$w;}return$I;}function
foreign_keys($Q){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$J){$r=&$I[$J["id"]];if(!$r)$r=$J;$r["source"][]=$J["from"];$r["target"][]=$J["to"];}return$I;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($D))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($D){global$g;$Oc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Oc)\$~",$D)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$Oc));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='File exists.';return
false;}if(!check_sqlite_name($l))return
false;try{$A=new
Min_SQLite($l);}catch(Exception$Fc){$g->error=$Fc->getMessage();return
false;}$A->query('PRAGMA encoding = "UTF-8"');$A->query('CREATE TABLE adminer (i)');$A->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($D,$d){global$g;if(!check_sqlite_name($D))return
false;$g->__construct(":memory:");$g->error='File exists.';return@rename(DB,$D);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$D,$p,$fd,$rb,$yc,$d,$Ka,$Tf){global$g;$Mi=($Q==""||$fd);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Mi=true;break;}}$c=array();$Hf=array();foreach($p
as$o){if($o[1]){$c[]=($Mi?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Hf[$o[0]]=$o[1][0];}}if(!$Mi){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$D&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($D)))return
false;}elseif(!recreate_table($Q,$D,$c,$Hf,$fd,$Ka))return
false;if($Ka){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ka WHERE name = ".q($D));if(!$g->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($D).", $Ka)");queries("COMMIT");}return
true;}function
recreate_table($Q,$D,$p,$Hf,$fd,$Ka,$x=array()){global$g;if($Q!=""){if(!$p){foreach(fields($Q)as$z=>$o){if($x)$o["auto_increment"]=0;$p[]=process_field($o,$o);$Hf[$z]=idf_escape($z);}}$lg=false;foreach($p
as$o){if($o[6])$lg=true;}$lc=array();foreach($x
as$z=>$X){if($X[2]=="DROP"){$lc[$X[1]]=true;unset($x[$z]);}}foreach(indexes($Q)as$ge=>$w){$f=array();foreach($w["columns"]as$z=>$e){if(!$Hf[$e])continue
2;$f[]=$Hf[$e].($w["descs"][$z]?" DESC":"");}if(!$lc[$ge]){if($w["type"]!="PRIMARY"||!$lg)$x[]=array($w["type"],$ge,$f);}}foreach($x
as$z=>$X){if($X[0]=="PRIMARY"){unset($x[$z]);$fd[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$ge=>$r){foreach($r["source"]as$z=>$e){if(!$Hf[$e])continue
2;$r["source"][$z]=idf_unescape($Hf[$e]);}if(!isset($fd[" $ge"]))$fd[]=" ".format_foreign_key($r);}queries("BEGIN");}foreach($p
as$z=>$o)$p[$z]="  ".implode($o);$p=array_merge($p,array_filter($fd));$Yh=($Q==$D?"adminer_$D":$D);if(!queries("CREATE TABLE ".table($Yh)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($Hf&&!queries("INSERT INTO ".table($Yh)." (".implode(", ",$Hf).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Hf)))." FROM ".table($Q)))return
false;$zi=array();foreach(triggers($Q)as$xi=>$fi){$wi=trigger($xi);$zi[]="CREATE TRIGGER ".idf_escape($xi)." ".implode(" ",$fi)." ON ".table($D)."\n$wi[Statement]";}$Ka=$Ka?0:$g->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$D&&!queries("ALTER TABLE ".table($Yh)." RENAME TO ".table($D)))||!alter_indexes($D,$x))return
false;if($Ka)queries("UPDATE sqlite_sequence SET seq = $Ka WHERE name = ".q($D));foreach($zi
as$wi){if(!queries($wi))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$D,$f){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($D!=""?$D:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$kg){if($kg[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Yi){return
apply_queries("DROP VIEW",$Yi);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Yi,$Wh){return
false;}function
trigger($D){global$g;if($D=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$v='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$yi=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$v\\s*(".implode("|",$yi["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($v))?\\s+ON\\s*$v\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($D)),$C);$gf=$C[3];return
array("Timing"=>strtoupper($C[1]),"Event"=>strtoupper($C[2]).($gf?" OF":""),"Of"=>idf_unescape($gf),"Trigger"=>$D,"Statement"=>$C[4],);}function
triggers($Q){$I=array();$yi=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$J){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$yi["Timing"]).')\s*(.*?)\s+ON\b~i',$J["sql"],$C);$I[$J["name"]]=array($C[1],$C[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$G){return$g->query("EXPLAIN QUERY PLAN $G");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ah){return
true;}function
create_sql($Q,$Ka,$Hh){global$g;$I=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$D=>$w){if($D=='')continue;$I.=";\n\n".index_sql($Q,$w['type'],$D,"(".implode(", ",array_map('idf_escape',$w['columns'])).")");}return$I;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$g;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$z)$I[$z]=$g->result("PRAGMA $z");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$wf){list($z,$X)=explode("=",$wf,2);$I[$z]=$X;}return$I;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Tc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Tc);}function
driver_config(){$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);return
array('possible_drivers'=>array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite"),'jush'=>"sqlite",'types'=>$U,'structured_types'=>array_keys($U),'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL"),'functions'=>array("hex","length","lower","round","unixepoch","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",)),);}}$ic["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Ac,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Wi=pg_version($this->_link);$this->server_info=$Wi["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"&&$X!==null?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$Bi=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);$I=false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);$I=true;}else$I=new
Min_Result($H);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$e);$I->name=pg_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$e);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$F){global$b;$l=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' client_encoding=utf8 dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($Xg){return
q($Xg);}function
query($G,$Bi=false){$I=parent::query($G,$Bi);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$I;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$kg){global$g;foreach($K
as$N){$Ii=array();$Z=array();foreach($N
as$z=>$X){$Ii[]="$z = $X";if(isset($kg[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Ii)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($G,$ei){$this->_conn->query("SET statement_timeout = ".(1000*$ei));$this->_conn->timeout=1000*$ei;return$G;}function
convertSearch($v,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$v:"CAST($v AS text)");}function
quoteBinary($Xg){return$this->_conn->quoteBinary($Xg);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($D){$we=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$A=$we[$_GET["ns"]];if($A)return"$A-".str_replace("_","-",$D).".html";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b,$U,$Gh;$g=new
Min_DB;$Kb=$b->credentials();if($g->connect($Kb[0],$Kb[1],$Kb[2])){if(min_version(9,0,$g)){$g->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$g)){$Gh['Strings'][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$g)){$Gh['Strings'][]="jsonb";$U["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$_,$hf=0,$hh=" "){return" $G$Z".($_!==null?$hh."LIMIT $_".($hf?" OFFSET $hf":""):"");}function
limit1($Q,$G,$Z,$hh="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$hh):" $G".(is_view(table_status1($Q))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$hh."LIMIT 1)"));}function
db_collation($l,$lb){global$g;return$g->result("SELECT datcollate FROM pg_database WHERE datname = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($D=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($D!=""?"AND relname = ".q($D):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($D!=""?$I[$D]:$I);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Ba=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment".(min_version(10)?", a.attidentity":"")."
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$C);list(,$T,$te,$J["length"],$wa,$Ea)=$C;$J["length"].=$Ea;$bb=$T.$wa;if(isset($Ba[$bb])){$J["type"]=$Ba[$bb];$J["full_type"]=$J["type"].$te.$Ea;}else{$J["type"]=$T;$J["full_type"]=$J["type"].$te.$wa.$Ea;}if(in_array($J['attidentity'],array('a','d')))$J['default']='GENERATED '.($J['attidentity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$J["null"]=!$J["attnotnull"];$J["auto_increment"]=$J['attidentity']||preg_match('~^nextval\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^,)]+(.*)~',$J["default"],$C))$J["default"]=($C[1]=="NULL"?null:idf_unescape($C[1]).$C[2]);$I[$J["field"]]=$J;}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$Ph=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Ph AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption, (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Ph AND ci.oid = i.indexrelid",$h)as$J){$Hg=$J["relname"];$I[$Hg]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$Hg]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Pd)$I[$Hg]["columns"][]=$f[$Pd];$I[$Hg]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Qd)$I[$Hg]["descs"][]=($Qd&1?'1':null);$I[$Hg]["lengths"]=array();}return$I;}function
foreign_keys($Q){global$pf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$C)){$J['source']=array_map('idf_unescape',array_map('trim',explode(',',$C[1])));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$C[2],$Be)){$J['ns']=idf_unescape($Be[2]);$J['table']=idf_unescape($Be[4]);}$J['target']=array_map('idf_unescape',array_map('trim',explode(',',$C[3])));$J['on_delete']=(preg_match("~ON DELETE ($pf)~",$C[4],$Be)?$Be[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($pf)~",$C[4],$Be)?$Be[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
constraints($Q){global$pf;$I=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($Q)."
ORDER BY connamespace, conname")as$J)$I[$J['conname']]=$J['consrc'];return$I;}function
view($D){global$g;return
array("select"=>trim($g->result("SELECT pg_get_viewdef(".$g->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($D)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$I=h($g->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$I,$C))$I=$C[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($C[3]).'})(.*)~','\1<b>\2</b>',$C[2]).$C[4];return
nl_br($I);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($D,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($D));}function
auto_increment(){return"";}function
alter_table($Q,$D,$p,$fd,$rb,$yc,$d,$Ka,$Tf){$c=array();$vg=array();if($Q!=""&&$Q!=$D)$vg[]="ALTER TABLE ".table($Q)." RENAME TO ".table($D);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Si=$X[5];unset($X[5]);if($o[0]==""){if(isset($X[6]))$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";$c[]=($Q!=""?"ADD ":"  ").implode($X);if(isset($X[6]))$c[]=($Q!=""?"ADD":" ")." PRIMARY KEY ($X[0])";}else{if($e!=$X[0])$vg[]="ALTER TABLE ".table($D)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Si!="")$vg[]="COMMENT ON COLUMN ".table($D).".$X[0] IS ".($Si!=""?substr($Si,9):"''");}}$c=array_merge($c,$fd);if($Q=="")array_unshift($vg,"CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($vg,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""||$rb!="")$vg[]="COMMENT ON TABLE ".table($D)." IS ".q($rb);if($Ka!=""){}foreach($vg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($Q,$c){$i=array();$jc=array();$vg=array();foreach($c
as$X){if($X[0]!="INDEX")$i[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$jc[]=idf_escape($X[1]);else$vg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($i)array_unshift($vg,"ALTER TABLE ".table($Q).implode(",",$i));if($jc)array_unshift($vg,"DROP INDEX ".implode(", ",$jc));foreach($vg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Yi){return
drop_tables($Yi);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$Yi,$Wh){foreach(array_merge($S,$Yi)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($Wh)))return
false;}return
true;}function
trigger($D,$Q){if($D=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$f=array();$Z="WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q)." AND trigger_name = ".q($D);foreach(get_rows("SELECT * FROM information_schema.triggered_update_columns $Z")as$J)$f[]=$J["event_object_column"];$I=array();foreach(get_rows('SELECT trigger_name AS "Trigger", action_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers '."$Z ORDER BY event_manipulation DESC")as$J){if($f&&$J["Event"]=="UPDATE")$J["Event"].=" OF";$J["Of"]=implode(", ",$f);if($I)$J["Event"].=" OR $I[Event]";$I=$J;}return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q))as$J){$wi=trigger($J["trigger_name"],$Q);$I[$wi["Trigger"]]=array($wi["Timing"],$wi["Event"]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE","INSERT OR UPDATE","INSERT OR UPDATE OF","DELETE OR INSERT","DELETE OR UPDATE","DELETE OR UPDATE OF","DELETE OR INSERT OR UPDATE","DELETE OR INSERT OR UPDATE OF"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($D,$T){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($D));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($D).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($D,$J){$I=array();foreach($J["fields"]as$o)$I[]=$o["type"];return
idf_escape($D)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($g,$G){return$g->query("EXPLAIN $G");}function
found_rows($R,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Gg))return$Gg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($Zg,$h=null){global$g,$U,$Gh;if(!$h)$h=$g;$I=$h->query("SET search_path TO ".idf_escape($Zg));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Gh['User types'][]=$T;}}return$I;}function
foreign_keys_sql($Q){$I="";$O=table_status($Q);$cd=foreign_keys($Q);ksort($cd);foreach($cd
as$bd=>$ad)$I.="ALTER TABLE ONLY ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." ADD CONSTRAINT ".idf_escape($bd)." $ad[definition] ".($ad['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($I?"$I\n":$I);}function
create_sql($Q,$Ka,$Hh){global$g;$I='';$Pg=array();$jh=array();$O=table_status($Q);if(is_view($O)){$Xi=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $Xi[select]",";");}$p=fields($Q);$x=indexes($Q);ksort($x);$Ab=constraints($Q);if(!$O||empty($p))return
false;$I="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$Vc=>$o){$Qf=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Pg[]=$Qf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Ce)){$ih=$Ce[1];$xh=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($ih):"SELECT * FROM $ih"));$jh[]=($Hh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $ih;\n":"")."CREATE SEQUENCE $ih INCREMENT $xh[increment_by] MINVALUE $xh[min_value] MAXVALUE $xh[max_value]".($Ka&&$xh['last_value']?" START $xh[last_value]":"")." CACHE $xh[cache_value];";}}if(!empty($jh))$I=implode("\n\n",$jh)."\n\n$I";foreach($x
as$Kd=>$w){switch($w['type']){case'UNIQUE':$Pg[]="CONSTRAINT ".idf_escape($Kd)." UNIQUE (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;case'PRIMARY':$Pg[]="CONSTRAINT ".idf_escape($Kd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;}}foreach($Ab
as$xb=>$zb)$Pg[]="CONSTRAINT ".idf_escape($xb)." CHECK $zb";$I.=implode(",\n    ",$Pg)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($x
as$Kd=>$w){if($w['type']=='INDEX'){$f=array();foreach($w['columns']as$z=>$X)$f[]=idf_escape($X).($w['descs'][$z]?" DESC":"");$I.="\n\nCREATE INDEX ".idf_escape($Kd)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$f).");";}}if($O['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$Vc=>$o){if($o['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($Vc)." IS ".q($o['comment']).";";}return
rtrim($I,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$I="";foreach(triggers($Q)as$vi=>$ui){$wi=trigger($vi,$O['Name']);$I.="\nCREATE TRIGGER ".idf_escape($wi['Trigger'])." $wi[Timing] $wi[Event] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $wi[Type] $wi[Statement];;\n";}return$I;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Tc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Tc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}function
driver_config(){$U=array();$Gh=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$z=>$X){$U+=$X;$Gh[$z]=array_keys($X);}return
array('possible_drivers'=>array("PgSQL","PDO_PgSQL"),'jush'=>"pgsql",'types'=>$U,'structured_types'=>$Gh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("char_length","lower","round","to_hex","to_timestamp","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",)),);}}$ic["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;var$_current_db;function
_error($Ac,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$F){$this->_link=@oci_new_connect($V,$F,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){$this->_current_db=$j;return
true;}function
query($G,$Bi=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);oci_free_statement($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$z=>$X){if(is_a($X,'OCI-Lob'))$J[$z]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$e);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";var$_current_db;function
connect($M,$V,$F){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){$this->_current_db=$j;return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}function
insertUpdate($Q,$K,$kg){global$g;foreach($K
as$N){$Ii=array();$Z=array();foreach($N
as$z=>$X){$Ii[]="$z = $X";if(isset($kg[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Ii)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$Kb=$b->credentials();if($g->connect($Kb[0],$Kb[1],$Kb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces ORDER BY 1");}function
limit($G,$Z,$_,$hf=0,$hh=" "){return($hf?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($_+$hf).") WHERE rnum > $hf":($_!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($_+$hf):" $G$Z"));}function
limit1($Q,$G,$Z,$hh="\n"){return" $G$Z";}function
db_collation($l,$lb){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
get_current_db(){global$g;$l=$g->_current_db?$g->_current_db:DB;unset($g->_current_db);return$l;}function
where_owner($ig,$Kf="owner"){if(!$_GET["ns"])return'';return"$ig$Kf = sys_context('USERENV', 'CURRENT_SCHEMA')";}function
views_table($f){$Kf=where_owner('');return"(SELECT $f FROM all_views WHERE ".($Kf?$Kf:"rownum < 0").")";}function
tables_list(){$Xi=views_table("view_name");$Kf=where_owner(" AND ");return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."$Kf
UNION SELECT view_name, 'view' FROM $Xi
ORDER BY 1");}function
count_tables($k){global$g;$I=array();foreach($k
as$l)$I[$l]=$g->result("SELECT COUNT(*) FROM all_tables WHERE tablespace_name = ".q($l));return$I;}function
table_status($D=""){$I=array();$bh=q($D);$l=get_current_db();$Xi=views_table("view_name");$Kf=where_owner(" AND ");foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q($l).$Kf.($D!=""?" AND table_name = $bh":"")."
UNION SELECT view_name, 'view', 0, 0 FROM $Xi".($D!=""?" WHERE view_name = $bh":"")."
ORDER BY 1")as$J){if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Kf=where_owner(" AND ");foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)."$Kf ORDER BY column_id")as$J){$T=$J["DATA_TYPE"];$te="$J[DATA_PRECISION],$J[DATA_SCALE]";if($te==",")$te=$J["CHAR_COL_DECL_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$T.($te?"($te)":""),"type"=>strtolower($T),"length"=>$te,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($Q,$h=null){$I=array();$Kf=where_owner(" AND ","aic.table_owner");foreach(get_rows("SELECT aic.*, ac.constraint_type, atc.data_default
FROM all_ind_columns aic
LEFT JOIN all_constraints ac ON aic.index_name = ac.constraint_name AND aic.table_name = ac.table_name AND aic.index_owner = ac.owner
LEFT JOIN all_tab_cols atc ON aic.column_name = atc.column_name AND aic.table_name = atc.table_name AND aic.index_owner = atc.owner
WHERE aic.table_name = ".q($Q)."$Kf
ORDER BY ac.constraint_type, aic.column_position",$h)as$J){$Kd=$J["INDEX_NAME"];$ob=$J["DATA_DEFAULT"];$ob=($ob?trim($ob,'"'):$J["COLUMN_NAME"]);$I[$Kd]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Kd]["columns"][]=$ob;$I[$Kd]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Kd]["descs"][]=($J["DESCEND"]&&$J["DESCEND"]=="DESC"?'1':null);}return$I;}function
view($D){$Xi=views_table("view_name, text");$K=get_rows('SELECT text "select" FROM '.$Xi.' WHERE view_name = '.q($D));return
reset($K);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$G){$g->query("EXPLAIN PLAN FOR $G");return$g->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
auto_increment(){return"";}function
alter_table($Q,$D,$p,$fd,$rb,$yc,$d,$Ka,$Tf){$c=$jc=array();$Ef=($Q?fields($Q):array());foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");$Df=$Ef[$o[0]];if($X&&$Df){$jf=process_field($Df,$Df);if($X[2]==$jf[2])$X[2]="";}if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$jc[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$jc||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$jc).")"))&&($Q==$D||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($D)));}function
alter_indexes($Q,$c){$jc=array();$vg=array();foreach($c
as$X){if($X[0]!="INDEX"){$X[2]=preg_replace('~ DESC$~','',$X[2]);$i=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");array_unshift($vg,"ALTER TABLE ".table($Q).$i);}elseif($X[2]=="DROP")$jc[]=idf_escape($X[1]);else$vg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($jc)array_unshift($vg,"DROP INDEX ".implode(", ",$jc));foreach($vg
as$G){if(!queries($G))return
false;}return
true;}function
foreign_keys($Q){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Yi){return
apply_queries("DROP VIEW",$Yi);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){$I=get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX')) ORDER BY 1");return($I?$I:get_vals("SELECT DISTINCT owner FROM all_tables WHERE tablespace_name = ".q(DB)." ORDER BY 1"));}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($ah,$h=null){global$g;if(!$h)$h=$g;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($ah));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Tc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view)$~',$Tc);}function
driver_config(){$U=array();$Gh=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$z=>$X){$U+=$X;$Gh[$z]=array_keys($X);}return
array('possible_drivers'=>array("OCI8","PDO_OCI"),'jush'=>"oracle",'types'=>$U,'structured_types'=>$Gh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("length","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",)),);}}$ic["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$F){global$b;$l=$b->database();$yb=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($l!="")$yb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$yb);if($this->_link){$Rd=sqlsrv_server_info($this->_link);$this->server_info=$Rd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Bi=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$z=>$X){if(is_a($X,'DateTime'))$J[$z]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$o["Name"];$I->orgname=$o["Name"];$I->type=($o["Type"]==1?254:0);return$I;}function
seek($hf){for($t=0;$t<$hf;$t++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$F){$this->_link=@mssql_connect($M,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($H){$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$Bi=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($hf){mssql_data_seek($this->_result,$hf);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$kg){foreach($K
as$N){$Ii=array();$Z=array();foreach($N
as$z=>$X){$Ii[]="$z = $X";if(isset($kg[idf_unescape($z)]))$Z[]="$z = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Ii)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($v){return"[".str_replace("]","]]",$v)."]";}function
table($v){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$Kb=$b->credentials();if($g->connect($Kb[0],$Kb[1],$Kb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$_,$hf=0,$hh=" "){return($_!==null?" TOP (".($_+$hf).")":"")." $G$Z";}function
limit1($Q,$G,$Z,$hh="\n"){return
limit($G,$Z,1,0,$hh);}function
db_collation($l,$lb){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$I=array();foreach($k
as$l){$g->select_db($l);$I[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($D=""){$I=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$J){if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$tb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$J){$T=$J["type"];$te=(preg_match("~char|binary~",$T)?$J["max_length"]:($T=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$T.($te?"($te)":""),"type"=>$T,"length"=>$te,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],"comment"=>$tb[$J["name"]],);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$h)as$J){$D=$J["name"];$I[$D]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$D]["lengths"]=array();$I[$D]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$D]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($D))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$I[preg_replace('~_.*~','',$d)][]=$d;return$I;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($D,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($D));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$D,$p,$fd,$rb,$yc,$d,$Ka,$Tf){$c=array();$tb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$tb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($fd[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($D)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$D)queries("EXEC sp_rename ".q(table($Q)).", ".q($D));if($fd)$c[""]=$fd;foreach($c
as$z=>$X){if(!queries("ALTER TABLE ".idf_escape($D)." $z".implode(",",$X)))return
false;}foreach($tb
as$z=>$X){$rb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($D).", @level2type = N'Column', @level2name = ".q($z));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$rb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($D).", @level2type = N'Column', @level2name = ".q($z));}return
true;}function
alter_indexes($Q,$c){$w=array();$jc=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$jc[]=idf_escape($X[1]);else$w[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$w||queries("DROP INDEX ".implode(", ",$w)))&&(!$jc||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$jc)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$G){$g->query("SET SHOWPLAN_ALL ON");$I=$g->query($G);$g->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($R,$Z){}function
foreign_keys($Q){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$J){$r=&$I[$J["FK_NAME"]];$r["db"]=$J["PKTABLE_QUALIFIER"];$r["table"]=$J["PKTABLE_NAME"];$r["source"][]=$J["FKCOLUMN_NAME"];$r["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Yi){return
queries("DROP VIEW ".implode(", ",array_map('table',$Yi)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Yi,$Wh){return
apply_queries("ALTER SCHEMA ".idf_escape($Wh)." TRANSFER",array_merge($S,$Yi));}function
trigger($D){if($D=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($D));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$I["text"]);return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Zg){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Tc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$Tc);}function
driver_config(){$U=array();$Gh=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$z=>$X){$U+=$X;$Gh[$z]=array_keys($X);}return
array('possible_drivers'=>array("SQLSRV","MSSQL","PDO_DBLIB"),'jush'=>"mssql",'types'=>$U,'structured_types'=>$Gh,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("len","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",)),);}}$ic["mongo"]="MongoDB (alpha)";if(isset($_GET["mongo"])){define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Ji,$xf){try{$this->_link=new
MongoClient($Ji,$xf);if($xf["password"]!=""){$xf["password"]="";try{new
MongoClient($Ji,$xf);$this->error='Database does not support password.';}catch(Exception$pc){}}}catch(Exception$pc){$this->error=$pc->getMessage();}}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Fc){$this->error=$Fc->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$de){$J=array();foreach($de
as$z=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$z]=63;$J[$z]=(is_a($X,'MongoId')?"ObjectId(\"$X\")":(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?"$X":(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$z=>$X)$I[$z]=$J[$z];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$he=array_keys($this->_rows[0]);$D=$he[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}class
Min_Driver
extends
Min_SQL{public$kg="_id";function
select($Q,$L,$Z,$qd,$zf=array(),$_=1,$E=0,$mg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$uh=array();foreach($zf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Gb);$uh[$X]=($Gb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$L)->sort($uh)->limit($_!=""?+$_:0)->skip($E*$_));}function
insert($Q,$N){try{$I=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$N['_id'];return!$I['err'];}catch(Exception$Fc){$this->_conn->error=$Fc->getMessage();return
false;}}}function
get_databases($dd){global$g;$I=array();$Ub=$g->_link->listDBs();foreach($Ub['databases']as$l)$I[]=$l['name'];return$I;}function
count_tables($k){global$g;$I=array();foreach($k
as$l)$I[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$I;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$g;foreach($k
as$l){$Lg=$g->_link->selectDB($l)->drop();if(!$Lg['ok'])return
false;}return
true;}function
indexes($Q,$h=null){global$g;$I=array();foreach($g->_db->selectCollection($Q)->getIndexInfo()as$w){$cc=array();foreach($w["key"]as$e=>$T)$cc[]=($T==-1?'1':null);$I[$w["name"]]=array("type"=>($w["name"]=="_id_"?"PRIMARY":($w["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($w["key"]),"lengths"=>array(),"descs"=>$cc,);}return$I;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$uf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$affected_rows,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Ji,$xf){$gb='MongoDB\Driver\Manager';$this->_link=new$gb($Ji,$xf);$this->executeCommand('admin',array('ping'=>1));}function
executeCommand($l,$pb){$gb='MongoDB\Driver\Command';try{return$this->_link->executeCommand($l,new$gb($pb));}catch(Exception$pc){$this->error=$pc->getMessage();return
array();}}function
executeBulkWrite($We,$Wa,$Hb){try{$Og=$this->_link->executeBulkWrite($We,$Wa);$this->affected_rows=$Og->$Hb();return
true;}catch(Exception$pc){$this->error=$pc->getMessage();return
false;}}function
query($G){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$de){$J=array();foreach($de
as$z=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$z]=63;$J[$z]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'."$X\")":(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->getData():(is_a($X,'MongoDB\BSON\Regex')?"$X":(is_object($X)||is_array($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$z=>$X)$I[$z]=$J[$z];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$he=array_keys($this->_rows[0]);$D=$he[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}class
Min_Driver
extends
Min_SQL{public$kg="_id";function
select($Q,$L,$Z,$qd,$zf=array(),$_=1,$E=0,$mg=false){global$g;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$uh=array();foreach($zf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Gb);$uh[$X]=($Gb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$_=$_GET['limit'];$_=min(200,max(1,(int)$_));$rh=$E*$_;$gb='MongoDB\Driver\Query';try{return
new
Min_Result($g->_link->executeQuery("$g->_db_name.$Q",new$gb($Z,array('projection'=>$L,'limit'=>$_,'skip'=>$rh,'sort'=>$uh))));}catch(Exception$pc){$g->error=$pc->getMessage();return
false;}}function
update($Q,$N,$wg,$_=0,$hh="\n"){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($wg);$gb='MongoDB\Driver\BulkWrite';$Wa=new$gb(array());if(isset($N['_id']))unset($N['_id']);$Ig=array();foreach($N
as$z=>$Y){if($Y=='NULL'){$Ig[$z]=1;unset($N[$z]);}}$Ii=array('$set'=>$N);if(count($Ig))$Ii['$unset']=$Ig;$Wa->update($Z,$Ii,array('upsert'=>false));return$g->executeBulkWrite("$l.$Q",$Wa,'getModifiedCount');}function
delete($Q,$wg,$_=0){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($wg);$gb='MongoDB\Driver\BulkWrite';$Wa=new$gb(array());$Wa->delete($Z,array('limit'=>$_));return$g->executeBulkWrite("$l.$Q",$Wa,'getDeletedCount');}function
insert($Q,$N){global$g;$l=$g->_db_name;$gb='MongoDB\Driver\BulkWrite';$Wa=new$gb(array());if($N['_id']=='')unset($N['_id']);$Wa->insert($N);return$g->executeBulkWrite("$l.$Q",$Wa,'getInsertedCount');}}function
get_databases($dd){global$g;$I=array();foreach($g->executeCommand('admin',array('listDatabases'=>1))as$Ub){foreach($Ub->databases
as$l)$I[]=$l->name;}return$I;}function
count_tables($k){$I=array();return$I;}function
tables_list(){global$g;$mb=array();foreach($g->executeCommand($g->_db_name,array('listCollections'=>1))as$H)$mb[$H->name]='table';return$mb;}function
drop_databases($k){return
false;}function
indexes($Q,$h=null){global$g;$I=array();foreach($g->executeCommand($g->_db_name,array('listIndexes'=>$Q))as$w){$cc=array();$f=array();foreach(get_object_vars($w->key)as$e=>$T){$cc[]=($T==-1?'1':null);$f[]=$e;}$I[$w->name]=array("type"=>($w->name=="_id_"?"PRIMARY":(isset($w->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$cc,);}return$I;}function
fields($Q){global$m;$p=fields_from_edit();if(!$p){$H=$m->select($Q,array("*"),null,null,array(),10);if($H){while($J=$H->fetch_assoc()){foreach($J
as$z=>$X){$J[$z]=null;$p[$z]=array("field"=>$z,"type"=>"string","null"=>($z!=$m->primary),"auto_increment"=>($z==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}}return$p;}function
found_rows($R,$Z){global$g;$Z=where_to_query($Z);$mi=$g->executeCommand($g->_db_name,array('count'=>$R['Name'],'query'=>$Z))->toArray();return$mi[0]->n;}function
sql_query_where_parser($wg){$wg=preg_replace('~^\sWHERE \(?\(?(.+?)\)?\)?$~','\1',$wg);$ij=explode(' AND ',$wg);$jj=explode(') OR (',$wg);$Z=array();foreach($ij
as$gj)$Z[]=trim($gj);if(count($jj)==1)$jj=array();elseif(count($jj)>1)$Z=array();return
where_to_query($Z,$jj);}function
where_to_query($ej=array(),$fj=array()){global$b;$Pb=array();foreach(array('and'=>$ej,'or'=>$fj)as$T=>$Z){if(is_array($Z)){foreach($Z
as$Lc){list($jb,$sf,$X)=explode(" ",$Lc,3);if($jb=="_id"&&preg_match('~^(MongoDB\\\\BSON\\\\ObjectID)\("(.+)"\)$~',$X,$C)){list(,$gb,$X)=$C;$X=new$gb($X);}if(!in_array($sf,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$sf,$C)){$X=(float)$X;$sf=$C[1];}elseif(preg_match('~^\(date\)(.+)~',$sf,$C)){$Rb=new
DateTime($X);$gb='MongoDB\BSON\UTCDatetime';$X=new$gb($Rb->getTimestamp()*1000);$sf=$C[1];}switch($sf){case'=':$sf='$eq';break;case'!=':$sf='$ne';break;case'>':$sf='$gt';break;case'<':$sf='$lt';break;case'>=':$sf='$gte';break;case'<=':$sf='$lte';break;case'regex':$sf='$regex';break;default:continue
2;}if($T=='and')$Pb['$and'][]=array($jb=>array($sf=>$X));elseif($T=='or')$Pb['$or'][]=array($jb=>array($sf=>$X));}}}return$Pb;}$uf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($v){return$v;}function
idf_escape($v){return$v;}function
table_status($D="",$Sc=false){$I=array();foreach(tables_list()as$Q=>$T){$I[$Q]=array("Name"=>$Q);if($D==$Q)return$I[$Q];}return$I;}function
create_database($l,$d){return
true;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$Kb=$b->credentials();return$Kb[1];}function
connect(){global$b;$g=new
Min_DB;list($M,$V,$F)=$b->credentials();$xf=array();if($V.$F!=""){$xf["username"]=$V;$xf["password"]=$F;}$l=$b->database();if($l!="")$xf["db"]=$l;if(($Ja=getenv("MONGO_AUTH_SOURCE")))$xf["authSource"]=$Ja;$g->connect("mongodb://$M",$xf);if($g->error)return$g->error;return$g;}function
alter_indexes($Q,$c){global$g;foreach($c
as$X){list($T,$D,$N)=$X;if($N=="DROP")$I=$g->_db->command(array("deleteIndexes"=>$Q,"index"=>$D));else{$f=array();foreach($N
as$e){$e=preg_replace('~ DESC$~','',$e,1,$Gb);$f[$e]=($Gb?-1:1);}$I=$g->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($T=="UNIQUE"),"name"=>$D,));}if($I['errmsg']){$g->error=$I['errmsg'];return
false;}}return
true;}function
support($Tc){return
preg_match("~database|indexes|descidx~",$Tc);}function
db_collation($l,$lb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$D,$p,$fd,$rb,$yc,$d,$Ka,$Tf){global$g;if($Q==""){$g->_db->createCollection($D);return
true;}}function
drop_tables($S){global$g;foreach($S
as$Q){$Lg=$g->_db->selectCollection($Q)->drop();if(!$Lg['ok'])return
false;}return
true;}function
truncate_tables($S){global$g;foreach($S
as$Q){$Lg=$g->_db->selectCollection($Q)->remove();if(!$Lg['ok'])return
false;}return
true;}function
driver_config(){global$uf;return
array('possible_drivers'=>array("mongo","mongodb"),'jush'=>"mongo",'operators'=>$uf,'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),);}}$ic["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($Xf,$Bb=array(),$Pe='GET'){@ini_set('track_errors',1);$Xc=@file_get_contents("$this->_url/".ltrim($Xf,'/'),false,stream_context_create(array('http'=>array('method'=>$Pe,'content'=>$Bb===null?$Bb:json_encode($Bb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Xc){$this->error=$php_errormsg;return$Xc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error='Invalid credentials.'." $http_response_header[0]";return
false;}$I=json_decode($Xc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$_b=get_defined_constants(true);foreach($_b['json']as$D=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$D)){$this->error=$D;break;}}}}return$I;}function
query($Xf,$Bb=array(),$Pe='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Xf,'/'),$Bb,$Pe);}function
connect($M,$V,$F){preg_match('~^(https?://)?(.*)~',$M,$C);$this->_url=($C[1]?$C[1]:"http://")."$V:$F@$C[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($K);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$L,$Z,$qd,$zf=array(),$_=1,$E=0,$mg=false){global$b;$Pb=array();$G="$Q/_search";if($L!=array("*"))$Pb["fields"]=$L;if($zf){$uh=array();foreach($zf
as$jb){$jb=preg_replace('~ DESC$~','',$jb,1,$Gb);$uh[]=($Gb?array($jb=>"desc"):$jb);}$Pb["sort"]=$uh;}if($_){$Pb["size"]=+$_;if($E)$Pb["from"]=($E*$_);}foreach($Z
as$X){list($jb,$sf,$X)=explode(" ",$X,3);if($jb=="_id")$Pb["query"]["ids"]["values"][]=$X;elseif($jb.$X!=""){$Zh=array("term"=>array(($jb!=""?$jb:"_all")=>$X));if($sf=="=")$Pb["query"]["filtered"]["filter"]["and"][]=$Zh;else$Pb["query"]["filtered"]["query"]["bool"]["must"][]=$Zh;}}if($Pb["query"]&&!$Pb["query"]["filtered"]["query"]&&!$Pb["query"]["ids"])$Pb["query"]["filtered"]["query"]=array("match_all"=>array());$Ch=microtime(true);$bh=$this->_conn->query($G,$Pb);if($mg)echo$b->selectQuery("$G: ".json_encode($Pb),$Ch,!$bh);if(!$bh)return
false;$I=array();foreach($bh['hits']['hits']as$Cd){$J=array();if($L==array("*"))$J["_id"]=$Cd["_id"];$p=$Cd['_source'];if($L!=array("*")){$p=array();foreach($L
as$z)$p[$z]=$Cd['fields'][$z];}foreach($p
as$z=>$X){if($Pb["fields"])$X=$X[0];$J[$z]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($T,$_g,$wg,$_=0,$hh="\n"){$Vf=preg_split('~ *= *~',$wg);if(count($Vf)==2){$u=trim($Vf[1]);$G="$T/$u";return$this->_conn->query($G,$_g,'POST');}return
false;}function
insert($T,$_g){$u="";$G="$T/$u";$Lg=$this->_conn->query($G,$_g,'POST');$this->_conn->last_id=$Lg['_id'];return$Lg['created'];}function
delete($T,$wg,$_=0){$Gd=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Gd[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$ab){$Vf=preg_split('~ *= *~',$ab);if(count($Vf)==2)$Gd[]=trim($Vf[1]);}}$this->_conn->affected_rows=0;foreach($Gd
as$u){$G="{$T}/{$u}";$Lg=$this->_conn->query($G,'{}','DELETE');if(is_array($Lg)&&$Lg['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;list($M,$V,$F)=$b->credentials();if($F!=""&&$g->connect($M,$V,""))return'Database does not support password.';if($g->connect($M,$V,$F))return$g;return$g->error;}function
support($Tc){return
preg_match("~database|table|columns~",$Tc);}function
logged_user(){global$b;$Kb=$b->credentials();return$Kb[1];}function
get_databases(){global$g;$I=$g->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($l,$lb){}function
engines(){return
array();}function
count_tables($k){global$g;$I=array();$H=$g->query('_stats');if($H&&$H['indices']){$Od=$H['indices'];foreach($Od
as$Nd=>$Dh){$Md=$Dh['total']['indexing'];$I[$Nd]=$Md['index_total'];}}return$I;}function
tables_list(){global$g;if(min_version(6))return
array('_doc'=>'table');$I=$g->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$g->_db]["mappings"]),'table');return$I;}function
table_status($D="",$Sc=false){global$g;$bh=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($bh){$S=$bh["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$I[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($D!=""&&$D==$Q["key"])return$I[$D];}}return$I;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$g;$ze=array();if(min_version(6)){$H=$g->query("_mapping");if($H)$ze=$H[$g->_db]['mappings']['properties'];}else{$H=$g->query("$Q/_mapping");if($H){$ze=$H[$Q]['properties'];if(!$ze)$ze=$H[$g->_db]['mappings'][$Q]['properties'];}}$I=array();if($ze){foreach($ze
as$D=>$o){$I[$D]=array("field"=>$D,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($I[$D]["privileges"]["insert"]);unset($I[$D]["privileges"]["update"]);}}}return$I;}function
foreign_keys($Q){return
array();}function
table($v){return$v;}function
idf_escape($v){return$v;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$D,$p,$fd,$rb,$yc,$d,$Ka,$Tf){global$g;$sg=array();foreach($p
as$Qc){$Vc=trim($Qc[1][0]);$Wc=trim($Qc[1][1]?$Qc[1][1]:"text");$sg[$Vc]=array('type'=>$Wc);}if(!empty($sg))$sg=array('properties'=>$sg);return$g->query("_mapping/{$D}",$sg,'PUT');}function
drop_tables($S){global$g;$I=true;foreach($S
as$Q)$I=$I&&$g->query(urlencode($Q),array(),'DELETE');return$I;}function
last_id(){global$g;return$g->last_id;}function
driver_config(){$U=array();$Gh=array();foreach(array('Numbers'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date and time'=>array("date"=>10),'Strings'=>array("string"=>65535,"text"=>65535),'Binary'=>array("binary"=>255),)as$z=>$X){$U+=$X;$Gh[$z]=array_keys($X);}return
array('possible_drivers'=>array("json + allow_url_fopen"),'jush'=>"elastic",'operators'=>array("=","query"),'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),'types'=>$U,'structured_types'=>$Gh,);}}class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($i=false){return
password_file($i);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){return
h($M);}function
database(){return
DB;}function
databases($dd=true){return
get_databases($dd);}function
schemas(){return
schemas();}function
queryTimeout(){return
2;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$q="adminer.css";if(file_exists($q))$I[]="$q?v=".crc32(file_get_contents($q));return$I;}function
loginForm(){global$ic;echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('driver','<tr><th>'.'System'.'<td>',html_select("auth[driver]",$ic,DRIVER,"loginDriver(this);")."\n"),$this->loginFormField('server','<tr><th>'.'Server'.'<td>','<input name="auth[server]" value="'.h(SERVER).'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">'."\n"),$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username')); qs('#username').form['auth[driver]'].onchange();")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),$this->loginFormField('db','<tr><th>'.'Database'.'<td>','<input name="auth[db]" value="'.h($_GET["db"]).'" autocapitalize="off">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($D,$_d,$Y){return$_d.$Y;}function
login($xe,$F){if($F=="")return
sprintf('Adminer does not support accessing a database without a password, <a href="https://www.adminer.org/en/password/"%s>more information</a>.',target_blank());return
true;}function
tableName($Nh){return
h($Nh["Name"]);}function
fieldName($o,$zf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Nh,$N=""){global$y,$m;echo'<p class="links">';$we=array("select"=>'Select data');if(support("table")||support("indexes"))$we["table"]='Show structure';if(support("table")){if(is_view($Nh))$we["view"]='Alter view';else$we["create"]='Alter table';}if($N!==null)$we["edit"]='New item';$D=$Nh["Name"];foreach($we
as$z=>$X)echo" <a href='".h(ME)."$z=".urlencode($D).($z=="edit"?$N:"")."'".bold(isset($_GET[$z])).">$X</a>";echo
doc_link(array($y=>$m->tableHelp($D)),"?"),"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Mh){return
array();}function
backwardKeysPrint($Na,$J){}function
selectQuery($G,$Ch,$Rc=false){global$y,$m;$I="</p>\n";if(!$Rc&&($bj=$m->warnings())){$u="warnings";$I=", <a href='#$u'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$u');","")."$I<div id='$u' class='hidden'>\n$bj</div>\n";}return"<p><code class='jush-$y'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>(".format_time($Ch).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($G)."'>".'Edit'."</a>":"").$I;}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($Q){return"";}function
rowDescriptions($K,$gd){return$K;}function
selectLink($X,$o){}function
selectVal($X,$A,$o,$Gf){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$I="<i>".lang(array('%d byte','%d bytes'),strlen($Gf))."</i>";if(preg_match('~json~',$o["type"]))$I="<code class='jush-js'>$I</code>";return($A?"<a href='".h($A)."'".(is_url($A)?target_blank():"").">$I</a>":$I);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(isset($o["default"])?" <span title='".'Default value'."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".h($o["comment"]):""),"\n";}echo"</table>\n","</div>\n";}function
tableIndexesPrint($x){echo"<table cellspacing='0'>\n";foreach($x
as$D=>$w){ksort($w["columns"]);$mg=array();foreach($w["columns"]as$z=>$X)$mg[]="<i>".h($X)."</i>".($w["lengths"][$z]?"(".$w["lengths"][$z].")":"").($w["descs"][$z]?" DESC":"");echo"<tr title='".h($D)."'><th>$w[type]<td>".implode(", ",$mg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$f){global$nd,$td;print_fieldset("select",'Select',$L);$t=0;$L[""]=array();foreach($L
as$z=>$X){$X=$_GET["columns"][$z];$e=select_input(" name='columns[$t][col]'",$f,$X["col"],($z!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($nd||$td?"<select name='columns[$t][fun]'>".optionlist(array(-1=>"")+array_filter(array('Functions'=>$nd,'Aggregation'=>$td)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($z!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($e)":$e)."</div>\n";$t++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$x){print_fieldset("search",'Search',$Z);foreach($x
as$t=>$w){if($w["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$w["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$t]' value='".h($_GET["fulltext"][$t])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$t]",1,isset($_GET["boolean"][$t]),"BOOL"),"</div>\n";}}$Ya="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$t=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$t][col]'",$f,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".'anywhere'.")"),html_select("where[$t][op]",$this->operators,$X["op"],$Ya),"<input type='search' name='where[$t][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $Ya }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($zf,$f,$x){print_fieldset("sort",'Sort',$zf);$t=0;foreach((array)$_GET["order"]as$z=>$X){if($X!=""){echo"<div>".select_input(" name='order[$t]'",$f,$X,"selectFieldChange"),checkbox("desc[$t]",1,isset($_GET["desc"][$z]),'descending')."</div>\n";$t++;}}echo"<div>".select_input(" name='order[$t]'",$f,"","selectAddRow"),checkbox("desc[$t]",1,false,'descending')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($_){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($_)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($ci){if($ci!==null){echo"<fieldset><legend>".'Text length'."</legend><div>","<input type='number' name='text_length' class='size' value='".h($ci)."'>","</div></fieldset>\n";}}function
selectActionPrint($x){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>"," <span id='noindex' title='".'Full table scan'."'></span>","<script".nonce().">\n","var indexColumns = ";$f=array();foreach($x
as$w){$Ob=reset($w["columns"]);if($w["type"]!="FULLTEXT"&&$Ob)$f[$Ob]=1;}$f[""]=1;foreach($f
as$z=>$X)json_row($z);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($vc,$f){}function
selectColumnsProcess($f,$x){global$nd,$td;$L=array();$qd=array();foreach((array)$_GET["columns"]as$z=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$nd)||in_array($X["fun"],$td)))){$L[$z]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$td))$qd[]=$L[$z];}}return
array($L,$qd);}function
selectSearchProcess($p,$x){global$g,$m;$I=array();foreach($x
as$t=>$w){if($w["type"]=="FULLTEXT"&&$_GET["fulltext"][$t]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$w["columns"])).") AGAINST (".q($_GET["fulltext"][$t]).(isset($_GET["boolean"][$t])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$z=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$ig="";$ub=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Jd=process_length($X["val"]);$ub.=" ".($Jd!=""?$Jd:"(NULL)");}elseif($X["op"]=="SQL")$ub=" $X[val]";elseif($X["op"]=="LIKE %%")$ub=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$ub=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$ig="$X[op](".q($X["val"]).", ";$ub=")";}elseif(!preg_match('~NULL$~',$X["op"]))$ub.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=$ig.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$ub;else{$nb=array();foreach($p
as$D=>$o){if((preg_match('~^[-\d.'.(preg_match('~IN$~',$X["op"])?',':'').']+$~',$X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"]))&&(!preg_match('~date|timestamp~',$o["type"])||preg_match('~^\d+-\d+-\d+~',$X["val"])))$nb[]=$ig.$m->convertSearch(idf_escape($D),$X,$o).$ub;}$I[]=($nb?"(".implode(" OR ",$nb).")":"1 = 0");}}}return$I;}function
selectOrderProcess($p,$x){$I=array();foreach((array)$_GET["order"]as$z=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\(DISTINCT |[A-Z0-9_]+\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\)|COUNT\(\*\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$z])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$gd){return
false;}function
selectQueryBuild($L,$Z,$qd,$zf,$_,$E){return"";}function
messageQuery($G,$di,$Rc=false){global$y,$m;restart_session();$Ad=&get_session("queries");if(!$Ad[$_GET["db"]])$Ad[$_GET["db"]]=array();if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\n…";$Ad[$_GET["db"]][]=array($G,time(),$di);$_h="sql-".count($Ad[$_GET["db"]]);$I="<a href='#$_h' class='toggle'>".'SQL command'."</a>\n";if(!$Rc&&($bj=$m->warnings())){$u="warnings-".count($Ad[$_GET["db"]]);$I="<a href='#$u' class='toggle'>".'Warnings'."</a>, $I<div id='$u' class='hidden'>\n$bj</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $I<div id='$_h' class='hidden'><pre><code class='jush-$y'>".shorten_utf8($G,1000)."</code></pre>".($di?" <span class='time'>($di)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($Ad[$_GET["db"]])-1)).'">'.'Edit'.'</a>':'').'</div>';}function
editRowPrint($Q,$p,$J,$Ii){}function
editFunctions($o){global$qc;$I=($o["null"]?"NULL/":"");$Ii=isset($_GET["select"])||where($_GET);foreach($qc
as$z=>$nd){if(!$z||(!isset($_GET["call"])&&$Ii)){foreach($nd
as$Zf=>$X){if(!$Zf||preg_match("~$Zf~",$o["type"]))$I.="/$X";}}if($z&&!preg_match('~set|blob|bytea|raw|file|bool~',$o["type"]))$I.="/SQL";}if($o["auto_increment"]&&!$Ii)$I='Auto Increment';return
explode("/",$I);}function
editInput($Q,$o,$Ha,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ha value='-1' checked><i>".'original'."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ha value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ha,$o,$Y,0);return"";}function
editHint($Q,$o,$Y){return"";}function
processInput($o,$Y,$s=""){if($s=="SQL")return$Y;$D=$o["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$s))$I="$s()";elseif(preg_match('~^current_(date|timestamp)$~',$s))$I=$s;elseif(preg_match('~^([+-]|\|\|)$~',$s))$I=idf_escape($D)." $s $I";elseif(preg_match('~^[+-] interval$~',$s))$I=idf_escape($D)." $s ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$s))$I="$s(".idf_escape($D).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$s))$I="$s($I)";return
unconvert_field($o,$I);}function
dumpOutput(){$I=array('text'=>'open','file'=>'save');if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Hh,$ce=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Hh)dump_csv(array_keys(fields($Q)));}else{if($ce==2){$p=array();foreach(fields($Q)as$D=>$o)$p[]=idf_escape($D)." $o[full_type]";$i="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$i=create_sql($Q,$_POST["auto_increment"],$Hh);set_utf8mb4($i);if($Hh&&$i){if($Hh=="DROP+CREATE"||$ce==1)echo"DROP ".($ce==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($ce==1)$i=remove_definer($i);echo"$i;\n\n";}}}function
dumpData($Q,$Hh,$G){global$g,$y;$Ee=($y=="sqlite"?0:1048576);if($Hh){if($_POST["format"]=="sql"){if($Hh=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$H=$g->query($G,1);if($H){$Vd="";$Va="";$he=array();$Jh="";$Uc=($Q!=''?'fetch_assoc':'fetch_row');while($J=$H->$Uc()){if(!$he){$Ti=array();foreach($J
as$X){$o=$H->fetch_field();$he[]=$o->name;$z=idf_escape($o->name);$Ti[]="$z = VALUES($z)";}$Jh=($Hh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Ti):"").";\n";}if($_POST["format"]!="sql"){if($Hh=="table"){dump_csv($he);$Hh="INSERT";}dump_csv($J);}else{if(!$Vd)$Vd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$he)).") VALUES";foreach($J
as$z=>$X){$o=$p[$z];$J[$z]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&!preg_match('~\[~',$o["full_type"])&&is_numeric($X)?$X:q(($X===false?0:$X))):"NULL");}$Xg=($Ee?"\n":" ")."(".implode(",\t",$J).")";if(!$Va)$Va=$Vd.$Xg;elseif(strlen($Va)+4+strlen($Xg)+strlen($Jh)<$Ee)$Va.=",$Xg";else{echo$Va.$Jh;$Va=$Vd.$Xg;}}}if($Va)echo$Va.$Jh;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($Fd){return
friendly_url($Fd!=""?$Fd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Fd,$Se=false){$Jf=$_POST["output"];$Mc=(preg_match('~sql~',$_POST["format"])?"sql":($Se?"tar":"csv"));header("Content-Type: ".($Jf=="gz"?"application/x-gzip":($Mc=="tar"?"application/x-tar":($Mc=="sql"||$Jf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Jf=="gz")ob_start('ob_gzencode',1e6);return$Mc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Alter schema':'Create schema')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'Privileges'."</a>\n":"");return
true;}function
navigation($Re){global$ia,$y,$ic,$g;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Re=="auth"){$Jf="";foreach((array)$_SESSION["pwds"]as$Vi=>$lh){foreach($lh
as$M=>$Qi){foreach($Qi
as$V=>$F){if($F!==null){$Ub=$_SESSION["db"][$Vi][$M][$V];foreach(($Ub?array_keys($Ub):array(""))as$l)$Jf.="<li><a href='".h(auth_url($Vi,$M,$V,$l))."'>($ic[$Vi]) ".h($V.($M!=""?"@".$this->serverName($M):"").($l!=""?" - $l":""))."</a>\n";}}}}if($Jf)echo"<ul id='logins'>\n$Jf</ul>\n".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");}else{$S=array();if($_GET["ns"]!==""&&!$Re&&DB!=""){$g->select_db(DB);$S=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.8.1");if(support("sql")){echo'<script',nonce(),'>
';if($S){$we=array();foreach($S
as$Q=>$T)$we[]=preg_quote($Q,'/');echo"var jushLinks = { $y: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$we).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$y;\n";}$kh=$g->server_info;echo'bodyLoad(\'',(is_object($g)?preg_replace('~^(\d\.?\d).*~s','\1',$kh):""),'\'',(preg_match('~MariaDB~',$kh)?", true":""),');
</script>
';}$this->databasesPrint($Re);if(DB==""||!$Re){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".'SQL command'."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".'Import'."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Export'."</a>\n";}if($_GET["ns"]!==""&&!$Re&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Create table'."</a>\n";if(!$S)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Re){global$b,$g;$k=$this->databases();if(DB&&$k&&!in_array(DB,$k))array_unshift($k,DB);echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Sb=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".'database'."'>".'DB'."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Sb":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".'Use'."'".($k?" class='hidden'":"").">\n";if(support("scheme")){if($Re!="db"&&DB!=""&&$g->select_db(DB)){echo"<br>".'Schema'.": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Sb";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}foreach(array("import","sql","schema","dump","privileges")as$X){if(isset($_GET[$X])){echo"<input type='hidden' name='$X' value=''>";break;}}echo"</p></form>\n";}function
tablesPrint($S){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$Q=>$O){$D=$this->tableName($O);if($D!=""){echo'<li><a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select")." title='".'Select data'."'>".'select'."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($O)?"view":"structure"))." title='".'Show structure'."'>$D</a>":"<span>$D</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);$ic=array("server"=>"MySQL")+$ic;if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$F="",$j=null,$dg=null,$th=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Dd,$dg)=explode(":",$M,2);$Bh=$b->connectSsl();if($Bh)$this->ssl_set($Bh['key'],$Bh['cert'],$Bh['ca'],'','');$I=@$this->real_connect(($M!=""?$Dd:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($dg)?$dg:ini_get("mysqli.default_port")),(!is_numeric($dg)?$dg:$th),($Bh?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$I;}function
set_charset($Za){if(parent::set_charset($Za))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Za");}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Za){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Za,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Za");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$Bi=false){$H=@($Bi?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$F){global$b;$xf=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Bh=$b->connectSsl();if($Bh){if(!empty($Bh['key']))$xf[PDO::MYSQL_ATTR_SSL_KEY]=$Bh['key'];if(!empty($Bh['cert']))$xf[PDO::MYSQL_ATTR_SSL_CERT]=$Bh['cert'];if(!empty($Bh['ca']))$xf[PDO::MYSQL_ATTR_SSL_CA]=$Bh['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$F,$xf);return
true;}function
set_charset($Za){$this->query("SET NAMES $Za");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Bi=false){$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,!$Bi);return
parent::query($G,$Bi);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$K,$kg){$f=array_keys(reset($K));$ig="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Ti=array();foreach($f
as$z)$Ti[$z]="$z = VALUES($z)";$Jh="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ti);$Ti=array();$te=0;foreach($K
as$N){$Y="(".implode(", ",$N).")";if($Ti&&(strlen($ig)+$te+strlen($Y)+strlen($Jh)>1e6)){if(!queries($ig.implode(",\n",$Ti).$Jh))return
false;$Ti=array();$te=0;}$Ti[]=$Y;$te+=strlen($Y)+2;}return
queries($ig.implode(",\n",$Ti).$Jh);}function
slowQuery($G,$ei){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$ei FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$C))return"$C[1] /*+ MAX_EXECUTION_TIME(".($ei*1000).") */ $C[2]";}}function
convertSearch($v,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($v USING ".charset($this->_conn).")":$v);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($D){$_e=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($_e?"information-schema-$D-table/":str_replace("_","-",$D)."-table.html"));if(DB=="mysql")return($_e?"mysql$D-table/":"system-database.html");}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
connect(){global$b,$U,$Gh;$g=new
Min_DB;$Kb=$b->credentials();if($g->connect($Kb[0],$Kb[1],$Kb[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$g)){$Gh['Strings'][]="json";$U["json"]=4294967295;}return$g;}$I=$g->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($Xg=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$Xg;return$I;}function
get_databases($dd){$I=get_session("dbs");if($I===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$I=($dd?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$_,$hf=0,$hh=" "){return" $G$Z".($_!==null?$hh."LIMIT $_".($hf?" OFFSET $hf":""):"");}function
limit1($Q,$G,$Z,$hh="\n"){return
limit($G,$Z,1,0,$hh);}function
db_collation($l,$lb){global$g;$I=null;$i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$i,$C))$I=$C[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$i,$C))$I=$lb[$C[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$I=array();foreach($k
as$l)$I[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$I;}function
table_status($D="",$Sc=false){$I=array();foreach(get_rows($Sc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($D!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$J){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$J["Type"],$C);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$C[1],"length"=>$C[2],"unsigned"=>ltrim($C[3].$C[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$C[1])?(preg_match('~text~',$C[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$J["Default"])):$J["Default"]):null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$C)?$C[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$J["Extra"]),);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$h)as$J){$D=$J["Key_name"];$I[$D]["type"]=($D=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$D]["columns"][]=$J["Column_name"];$I[$D]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$D]["descs"][]=null;}return$I;}function
foreign_keys($Q){global$g,$pf;static$Zf='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$I=array();$Ib=$g->result("SHOW CREATE TABLE ".table($Q),1);if($Ib){preg_match_all("~CONSTRAINT ($Zf) FOREIGN KEY ?\\(((?:$Zf,? ?)+)\\) REFERENCES ($Zf)(?:\\.($Zf))? \\(((?:$Zf,? ?)+)\\)(?: ON DELETE ($pf))?(?: ON UPDATE ($pf))?~",$Ib,$Ce,PREG_SET_ORDER);foreach($Ce
as$C){preg_match_all("~$Zf~",$C[2],$vh);preg_match_all("~$Zf~",$C[5],$Wh);$I[idf_unescape($C[1])]=array("db"=>idf_unescape($C[4]!=""?$C[3]:$C[4]),"table"=>idf_unescape($C[4]!=""?$C[4]:$C[3]),"source"=>array_map('idf_unescape',$vh[0]),"target"=>array_map('idf_unescape',$Wh[0]),"on_delete"=>($C[6]?$C[6]:"RESTRICT"),"on_update"=>($C[7]?$C[7]:"RESTRICT"),);}}return$I;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$g->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$z=>$X)asort($I[$z]);return$I;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$I=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($D,$d){$I=false;if(create_database($D,$d)){$S=array();$Yi=array();foreach(tables_list()as$Q=>$T){if($T=='VIEW')$Yi[]=$Q;else$S[]=$Q;}$I=(!$S&&!$Yi)||move_tables($S,$Yi,$D);drop_databases($I?array(DB):array());}return$I;}function
auto_increment(){$La=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$w){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$w["columns"],true)){$La="";break;}if($w["type"]=="PRIMARY")$La=" UNIQUE";}}return" AUTO_INCREMENT$La";}function
alter_table($Q,$D,$p,$fd,$rb,$yc,$d,$Ka,$Tf){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$fd);$O=($rb!==null?" COMMENT=".q($rb):"").($yc?" ENGINE=".q($yc):"").($d?" COLLATE ".q($d):"").($Ka!=""?" AUTO_INCREMENT=$Ka":"");if($Q=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)$O$Tf");if($Q!=$D)$c[]="RENAME TO ".table($D);if($O)$c[]=ltrim($O);return($c||$Tf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Tf):true);}function
alter_indexes($Q,$c){foreach($c
as$z=>$X)$c[$z]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Yi){return
queries("DROP VIEW ".implode(", ",array_map('table',$Yi)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Yi,$Wh){global$g;$Jg=array();foreach($S
as$Q)$Jg[]=table($Q)." TO ".idf_escape($Wh).".".table($Q);if(!$Jg||queries("RENAME TABLE ".implode(", ",$Jg))){$Zb=array();foreach($Yi
as$Q)$Zb[table($Q)]=view($Q);$g->select_db($Wh);$l=idf_escape(DB);foreach($Zb
as$D=>$Xi){if(!queries("CREATE VIEW $D AS ".str_replace(" $l."," ",$Xi["select"]))||!queries("DROP VIEW $l.$D"))return
false;}return
true;}return
false;}function
copy_tables($S,$Yi,$Wh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$D=($Wh==DB?table("copy_$Q"):idf_escape($Wh).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $D"))||!queries("CREATE TABLE $D LIKE ".table($Q))||!queries("INSERT INTO $D SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J){$wi=$J["Trigger"];if(!queries("CREATE TRIGGER ".($Wh==DB?idf_escape("copy_$wi"):idf_escape($Wh).".".idf_escape($wi))." $J[Timing] $J[Event] ON $D FOR EACH ROW\n$J[Statement];"))return
false;}}foreach($Yi
as$Q){$D=($Wh==DB?table("copy_$Q"):idf_escape($Wh).".".table($Q));$Xi=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $D"))||!queries("CREATE VIEW $D AS $Xi[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($K);}function
triggers($Q){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$T){global$g,$_c,$Td,$U;$Ba=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$wh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ai="((".implode("|",array_merge(array_keys($U),$Ba)).")\\b(?:\\s*\\(((?:[^'\")]|$_c)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Zf="$wh*(".($T=="FUNCTION"?"":$Td).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Ai";$i=$g->result("SHOW CREATE $T ".idf_escape($D),2);preg_match("~\\(((?:$Zf\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Ai\\s+":"")."(.*)~is",$i,$C);$p=array();preg_match_all("~$Zf\\s*,?~is",$C[1],$Ce,PREG_SET_ORDER);foreach($Ce
as$Nf)$p[]=array("field"=>str_replace("``","`",$Nf[2]).$Nf[3],"type"=>strtolower($Nf[5]),"length"=>preg_replace_callback("~$_c~s",'normalize_enum',$Nf[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Nf[8] $Nf[7]"))),"null"=>1,"full_type"=>$Nf[4],"inout"=>strtoupper($Nf[1]),"collation"=>strtolower($Nf[9]),);if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$C[11]);return
array("fields"=>$p,"returns"=>array("type"=>$C[12],"length"=>$C[13],"unsigned"=>$C[15],"collation"=>$C[16]),"definition"=>$C[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($D,$J){return
idf_escape($D);}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$G){return$g->query("EXPLAIN ".(min_version(5.1)&&!min_version(5.7)?"PARTITIONS ":"").$G);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Zg,$h=null){return
true;}function
create_sql($Q,$Ka,$Hh){global$g;$I=$g->result("SHOW CREATE TABLE ".table($Q),1);if(!$Ka)$I=preg_replace('~ AUTO_INCREMENT=\d+~','',$I);return$I;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$I){if(preg_match("~binary~",$o["type"]))$I="UNHEX($I)";if($o["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I, SRID($o[field]))";return$I;}function
support($Tc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Tc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}function
driver_config(){$U=array();$Gh=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$z=>$X){$U+=$X;$Gh[$z]=array_keys($X);}return
array('possible_drivers'=>array("MySQLi","MySQL","PDO_MySQL"),'jush'=>"sql",'types'=>$U,'structured_types'=>$Gh,'unsigned'=>array("unsigned","zerofill","unsigned zerofill"),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)),);}}$vb=driver_config();$hg=$vb['possible_drivers'];$y=$vb['jush'];$U=$vb['types'];$Gh=$vb['structured_types'];$Hi=$vb['unsigned'];$uf=$vb['operators'];$nd=$vb['functions'];$td=$vb['grouping'];$qc=$vb['edit_functions'];if($b->operators===null)$b->operators=$uf;define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.8.1";function
page_header($gi,$n="",$Ua=array(),$hi=""){global$ca,$ia,$b,$ic,$y;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$ii=$gi.($hi!=""?": $hi":"");$ji=strip_tags($ii.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$ji,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.8.1"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.8.1");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
';foreach($b->css()as$Mb){echo'<link rel="stylesheet" type="text/css" href="',h($Mb),'">
';}}echo'
<body class="ltr nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Wi=unserialize(file_get_contents($q));$tg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Wi["version"],base64_decode($Wi["signature"]),$tg)==1)$_COOKIE["adminer_version"]=$Wi["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$y,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Ua!==null){$A=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($A?$A:".").'">'.$ic[DRIVER].'</a> &raquo; ';$A=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:'Server');if($Ua===false)echo"$M\n";else{echo"<a href='".h($A)."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ua)))echo'<a href="'.h($A."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ua)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ua
as$z=>$X){$bc=(is_array($X)?$X[1]:h($X));if($bc!="")echo"<a href='".h(ME."$z=").urlencode(is_array($X)?$X[0]:$X)."'>$bc</a> &raquo; ";}}echo"$gi\n";}}echo"<h2>$ii</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Lb){$zd=array();foreach($Lb
as$z=>$X)$zd[]="$z $X";header("Content-Security-Policy: ".implode("; ",$zd));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$bf;if(!$bf)$bf=base64_encode(rand_string());return$bf;}function
page_messages($n){$Ji=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Oe=$_SESSION["messages"][$Ji];if($Oe){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Oe)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ji]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Re=""){global$b,$ni;echo'</div>

';if($Re!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$ni,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Re);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Ue){while($Ue>=2147483648)$Ue-=4294967296;while($Ue<=-2147483649)$Ue+=4294967296;return(int)$Ue;}function
long2str($W,$aj){$Xg='';foreach($W
as$X)$Xg.=pack('V',$X);if($aj)return
substr($Xg,0,end($W));return$Xg;}function
str2long($Xg,$aj){$W=array_values(unpack('V*',str_pad($Xg,4*ceil(strlen($Xg)/4),"\0")));if($aj)$W[]=strlen($Xg);return$W;}function
xxtea_mx($mj,$lj,$Kh,$fe){return
int32((($mj>>5&0x7FFFFFF)^$lj<<2)+(($lj>>3&0x1FFFFFFF)^$mj<<4))^int32(($Kh^$lj)+($fe^$mj));}function
encrypt_string($Fh,$z){if($Fh=="")return"";$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Fh,true);$Ue=count($W)-1;$mj=$W[$Ue];$lj=$W[0];$ug=floor(6+52/($Ue+1));$Kh=0;while($ug-->0){$Kh=int32($Kh+0x9E3779B9);$pc=$Kh>>2&3;for($Lf=0;$Lf<$Ue;$Lf++){$lj=$W[$Lf+1];$Te=xxtea_mx($mj,$lj,$Kh,$z[$Lf&3^$pc]);$mj=int32($W[$Lf]+$Te);$W[$Lf]=$mj;}$lj=$W[0];$Te=xxtea_mx($mj,$lj,$Kh,$z[$Lf&3^$pc]);$mj=int32($W[$Ue]+$Te);$W[$Ue]=$mj;}return
long2str($W,false);}function
decrypt_string($Fh,$z){if($Fh=="")return"";if(!$z)return
false;$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Fh,false);$Ue=count($W)-1;$mj=$W[$Ue];$lj=$W[0];$ug=floor(6+52/($Ue+1));$Kh=int32($ug*0x9E3779B9);while($Kh){$pc=$Kh>>2&3;for($Lf=$Ue;$Lf>0;$Lf--){$mj=$W[$Lf-1];$Te=xxtea_mx($mj,$lj,$Kh,$z[$Lf&3^$pc]);$lj=int32($W[$Lf]-$Te);$W[$Lf]=$lj;}$mj=$W[$Ue];$Te=xxtea_mx($mj,$lj,$Kh,$z[$Lf&3^$pc]);$lj=int32($W[0]-$Te);$W[0]=$lj;$Kh=int32($Kh-0x9E3779B9);}return
long2str($W,true);}$g='';$yd=$_SESSION["token"];if(!$yd)$_SESSION["token"]=rand(1,1e6);$ni=get_token();$bg=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($z)=explode(":",$X);$bg[$z]=$X;}}function
add_invalid_login(){global$b;$ld=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$ld)return;$Yd=unserialize(stream_get_contents($ld));$di=time();if($Yd){foreach($Yd
as$Zd=>$X){if($X[0]<$di)unset($Yd[$Zd]);}}$Xd=&$Yd[$b->bruteForceKey()];if(!$Xd)$Xd=array($di+30*60,0);$Xd[1]++;file_write_unlock($ld,serialize($Yd));}function
check_invalid_login(){global$b;$Yd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Xd=($Yd?$Yd[$b->bruteForceKey()]:array());$af=($Xd[1]>29?$Xd[0]-time():0);if($af>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($af/60)));}$Ia=$_POST["auth"];if($Ia){session_regenerate_id();$Vi=$Ia["driver"];$M=$Ia["server"];$V=$Ia["username"];$F=(string)$Ia["password"];$l=$Ia["db"];set_password($Vi,$M,$V,$F);$_SESSION["db"][$Vi][$M][$V][$l]=true;if($Ia["permanent"]){$z=base64_encode($Vi)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($l);$ng=$b->permanentLogin(true);$bg[$z]="$z:".base64_encode($ng?encrypt_string($F,$ng):"");cookie("adminer_permanent",implode(" ",$bg));}if(count($_POST)==1||DRIVER!=$Vi||SERVER!=$M||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Vi,$M,$V,$l));}elseif($_POST["logout"]&&(!$yd||verify_token())){foreach(array("pwds","db","dbs","queries")as$z)set_session($z,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.'Thanks for using Adminer, consider <a href="https://www.adminer.org/en/donation/">donating</a>.');}elseif($bg&&!$_SESSION["pwds"]){session_regenerate_id();$ng=$b->permanentLogin();foreach($bg
as$z=>$X){list(,$fb)=explode(":",$X);list($Vi,$M,$V,$l)=array_map('base64_decode',explode("-",$z));set_password($Vi,$M,$V,decrypt_string(base64_decode($fb),$ng));$_SESSION["db"][$Vi][$M][$V][$l]=true;}}function
unset_permanent(){global$bg;foreach($bg
as$z=>$X){list($Vi,$M,$V,$l)=array_map('base64_decode',explode("-",$z));if($Vi==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$l==DB)unset($bg[$z]);}cookie("adminer_permanent",implode(" ",$bg));}function
auth_error($n){global$b,$yd;$mh=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$mh]||$_GET[$mh])&&!$yd)$n='Session expired, please login again.';else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.=($n?'<br>':'').sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$mh]&&$_GET[$mh]&&ini_bool("session.use_only_cookies"))$n='Session support must be enabled.';$Of=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Of["lifetime"]);page_header('Login',$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$hg)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Dd,$dg)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$dg,$C)&&($C[1]<1024||$C[1]>65535))auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$g=connect();$m=new
Min_Driver($g);}$xe=null;if(!is_object($g)||($xe=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($g)?h($g):(is_string($xe)?$xe:'Invalid credentials.'));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($_POST["logout"]&&$yd&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}if($Ia&&$_POST["token"])$_POST["token"]=$ni;$n='';if($_POST){if(!verify_token()){$Sd="max_input_vars";$Ie=ini_get($Sd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$z){$X=ini_get($z);if($X&&(!$Ie||$X<$Ie)){$Sd=$z;$Ie=$X;}}}$n=(!$_POST["token"]&&$Ie?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$Sd'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
select($H,$h=null,$Bf=array(),$_=0){global$y;$we=array();$x=array();$f=array();$Sa=array();$U=array();$I=array();odd('');for($t=0;(!$_||$t<$_)&&($J=$H->fetch_row());$t++){if(!$t){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($ee=0;$ee<count($J);$ee++){$o=$H->fetch_field();$D=$o->name;$Af=$o->orgtable;$_f=$o->orgname;$I[$o->table]=$Af;if($Bf&&$y=="sql")$we[$ee]=($D=="table"?"table=":($D=="possible_keys"?"indexes=":null));elseif($Af!=""){if(!isset($x[$Af])){$x[$Af]=array();foreach(indexes($Af,$h)as$w){if($w["type"]=="PRIMARY"){$x[$Af]=array_flip($w["columns"]);break;}}$f[$Af]=$x[$Af];}if(isset($f[$Af][$_f])){unset($f[$Af][$_f]);$x[$Af][$_f]=$ee;$we[$ee]=$Af;}}if($o->charsetnr==63)$Sa[$ee]=true;$U[$ee]=$o->type;echo"<th".($Af!=""||$o->name!=$_f?" title='".h(($Af!=""?"$Af.":"").$_f)."'":"").">".h($D).($Bf?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($D),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$z=>$X){$A="";if(isset($we[$z])&&!$f[$we[$z]]){if($Bf&&$y=="sql"){$Q=$J[array_search("table=",$we)];$A=ME.$we[$z].urlencode($Bf[$Q]!=""?$Bf[$Q]:$Q);}else{$A=ME."edit=".urlencode($we[$z]);foreach($x[$we[$z]]as$jb=>$ee)$A.="&where".urlencode("[".bracket_escape($jb)."]")."=".urlencode($J[$ee]);}}elseif(is_url($X))$A=$X;if($X===null)$X="<i>NULL</i>";elseif($Sa[$z]&&!is_utf8($X))$X="<i>".lang(array('%d byte','%d bytes'),strlen($X))."</i>";else{$X=h($X);if($U[$z]==254)$X="<code>$X</code>";}if($A)$X="<a href='".h($A)."'".(is_url($A)?target_blank():'').">$X</a>";echo"<td>$X";}}echo($t?"</table>\n</div>":"<p class='message'>".'No rows.')."\n";return$I;}function
referencable_primary($fh){$I=array();foreach(table_status('',true)as$Oh=>$Q){if($Oh!=$fh&&fk_support($Q)){foreach(fields($Oh)as$o){if($o["primary"]){if($I[$Oh]){unset($I[$Oh]);break;}$I[$Oh]=$o;}}}}return$I;}function
adminer_settings(){parse_str($_COOKIE["adminer_settings"],$oh);return$oh;}function
adminer_setting($z){$oh=adminer_settings();return$oh[$z];}function
set_adminer_settings($oh){return
cookie("adminer_settings",http_build_query($oh+adminer_settings()));}function
textarea($D,$Y,$K=10,$nb=80){global$y;echo"<textarea name='$D' rows='$K' cols='$nb' class='sqlarea jush-$y' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($z,$o,$lb,$hd=array(),$Pc=array()){global$Gh,$U,$Hi,$pf;$T=$o["type"];echo'<td><select name="',h($z),'[type]" class="type" aria-labelledby="label-type">';if($T&&!isset($U[$T])&&!isset($hd[$T])&&!in_array($T,$Pc))$Pc[]=$T;if($hd)$Gh['Foreign keys']=$hd;echo
optionlist(array_merge($Pc,$Gh),$T),'</select><td><input name="',h($z),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$T)?" class='required'":"");echo' aria-labelledby="label-length"><td class="options">',"<select name='".h($z)."[collation]'".(preg_match('~(char|text|enum|set)$~',$T)?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($lb,$o["collation"]).'</select>',($Hi?"<select name='".h($z)."[unsigned]'".(!$T||preg_match(number_type(),$T)?"":" class='hidden'").'><option>'.optionlist($Hi,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($z)."[on_update]'".(preg_match('~timestamp|datetime~',$T)?"":" class='hidden'").'>'.optionlist(array(""=>"(".'ON UPDATE'.")","CURRENT_TIMESTAMP"),(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"CURRENT_TIMESTAMP":$o["on_update"])).'</select>':''),($hd?"<select name='".h($z)."[on_delete]'".(preg_match("~`~",$T)?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$pf),$o["on_delete"])."</select> ":" ");}function
process_length($te){global$_c;return(preg_match("~^\\s*\\(?\\s*$_c(?:\\s*,\\s*$_c)*+\\s*\\)?\\s*\$~",$te)&&preg_match_all("~$_c~",$te,$Ce)?"(".implode(",",$Ce[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$te)));}function
process_type($o,$kb="COLLATE"){global$Hi;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$Hi)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $kb ".q($o["collation"]):"");}function
process_field($o,$_i){return
array(idf_escape(trim($o["field"])),process_type($_i),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Wb=$o["default"];return($Wb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Wb)?q($Wb):$Wb));}function
type_class($T){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$z=>$X){if(preg_match("~$z|$X~",$T))return" class='$z'";}}function
edit_fields($p,$lb,$T="TABLE",$hd=array()){global$Td;$p=array_values($p);$Xb=(($_POST?$_POST["defaults"]:adminer_setting("defaults"))?"":" class='hidden'");$sb=(($_POST?$_POST["comments"]:adminer_setting("comments"))?"":" class='hidden'");echo'<thead><tr>
';if($T=="PROCEDURE"){echo'<td>';}echo'<th id="label-name">',($T=="TABLE"?'Column name':'Parameter name'),'<td id="label-type">Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">Length
<td>','Options';if($T=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="Auto Increment">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default"',$Xb,'>Default value
',(support("comment")?"<td id='label-comment'$sb>".'Comment':"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".'Add next'."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$t=>$o){$t++;$Cf=$o[($_POST?"orig":"field")];$fc=(isset($_POST["add"][$t-1])||(isset($o["field"])&&!$_POST["drop_col"][$t]))&&(support("drop_col")||$Cf=="");echo'<tr',($fc?"":" style='display: none;'"),'>
',($T=="PROCEDURE"?"<td>".html_select("fields[$t][inout]",explode("|",$Td),$o["inout"]):""),'<th>';if($fc){echo'<input name="fields[',$t,'][field]" value="',h($o["field"]),'" data-maxlength="64" autocapitalize="off" aria-labelledby="label-name">';}echo'<input type="hidden" name="fields[',$t,'][orig]" value="',h($Cf),'">';edit_type("fields[$t]",$o,$lb,$hd);if($T=="TABLE"){echo'<td>',checkbox("fields[$t][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$t,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td',$Xb,'>',checkbox("fields[$t][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$t,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td$sb><input name='fields[$t][comment]' value='".h($o["comment"])."' data-maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".'Add next'."'> "."<input type='image' class='icon' name='up[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.8.1")."' alt='↑' title='".'Move up'."'> "."<input type='image' class='icon' name='down[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.8.1")."' alt='↓' title='".'Move down'."'> ":""),($Cf==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.8.1")."' alt='x' title='".'Remove'."'>":"");}}function
process_fields(&$p){$hf=0;if($_POST["up"]){$ne=0;foreach($p
as$z=>$o){if(key($_POST["up"])==$z){unset($p[$z]);array_splice($p,$ne,0,array($o));break;}if(isset($o["field"]))$ne=$hf;$hf++;}}elseif($_POST["down"]){$jd=false;foreach($p
as$z=>$o){if(isset($o["field"])&&$jd){unset($p[key($_POST["down"])]);array_splice($p,$hf,0,array($jd));break;}if(key($_POST["down"])==$z)$jd=$o;$hf++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($C){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($C[0][0].$C[0][0],$C[0][0],substr($C[0],1,-1))),'\\'))."'";}function
grant($od,$pg,$f,$of){if(!$pg)return
true;if($pg==array("ALL PRIVILEGES","GRANT OPTION"))return($od=="GRANT"?queries("$od ALL PRIVILEGES$of WITH GRANT OPTION"):queries("$od ALL PRIVILEGES$of")&&queries("$od GRANT OPTION$of"));return
queries("$od ".preg_replace('~(GRANT OPTION)\([^)]*\)~','\1',implode("$f, ",$pg).$f).$of);}function
drop_create($jc,$i,$kc,$ai,$mc,$B,$Ne,$Le,$Me,$lf,$Ye){if($_POST["drop"])query_redirect($jc,$B,$Ne);elseif($lf=="")query_redirect($i,$B,$Me);elseif($lf!=$Ye){$Jb=queries($i);queries_redirect($B,$Le,$Jb&&queries($jc));if($Jb)queries($kc);}else
queries_redirect($B,$Le,queries($ai)&&queries($mc)&&queries($jc)&&queries($i));}function
create_trigger($of,$J){global$y;$fi=" $J[Timing] $J[Event]".(preg_match('~ OF~',$J["Event"])?" $J[Of]":"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($y=="mssql"?$of.$fi:$fi.$of).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Tg,$J){global$Td,$y;$N=array();$p=(array)$J["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$N[]=(preg_match("~^($Td)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$Yb=rtrim("\n$J[definition]",";");return"CREATE $Tg ".idf_escape(trim($J["name"]))." (".implode(", ",$N).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").($y=="pgsql"?" AS ".q($Yb):"$Yb;");}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\1)',logged_user()).'`~','\1',$G);}function
format_foreign_key($r){global$pf;$l=$r["db"];$cf=$r["ns"];return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$r["source"])).") REFERENCES ".($l!=""&&$l!=$_GET["db"]?idf_escape($l).".":"").($cf!=""&&$cf!=$_GET["ns"]?idf_escape($cf).".":"").table($r["table"])." (".implode(", ",array_map('idf_escape',$r["target"])).")".(preg_match("~^($pf)\$~",$r["on_delete"])?" ON DELETE $r[on_delete]":"").(preg_match("~^($pf)\$~",$r["on_update"])?" ON UPDATE $r[on_update]":"");}function
tar_file($q,$ki){$I=pack("a100a8a8a8a12a12",$q,644,0,0,decoct($ki->size),decoct(time()));$eb=8*32;for($t=0;$t<strlen($I);$t++)$eb+=ord($I[$t]);$I.=sprintf("%06o",$eb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$ki->send();echo
str_repeat("\0",511-($ki->size+511)%512);}function
ini_bytes($Sd){$X=ini_get($Sd);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($Yf,$bi="<sup>?</sup>"){global$y,$g;$kh=$g->server_info;$Wi=preg_replace('~^(\d\.?\d).*~s','\1',$kh);$Li=array('sql'=>"https://dev.mysql.com/doc/refman/$Wi/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$Wi/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://www.oracle.com/pls/topic/lookup?ctx=db".preg_replace('~^.* (\d+)\.(\d+)\.\d+\.\d+\.\d+.*~s','\1\2',$kh)."&id=",);if(preg_match('~MariaDB~',$kh)){$Li['sql']="https://mariadb.com/kb/en/library/";$Yf['sql']=(isset($Yf['mariadb'])?$Yf['mariadb']:str_replace(".html","/",$Yf['sql']));}return($Yf[$y]?"<a href='".h($Li[$y].$Yf[$y])."'".target_blank().">$bi</a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($l){global$g;if(!$g->select_db($l))return"?";$I=0;foreach(table_status()as$R)$I+=$R["Data_length"]+$R["Index_length"];return
format_number($I);}function
set_utf8mb4($i){global$g;static$N=false;if(!$N&&preg_match('~\butf8mb4~i',$i)){$N=true;echo"SET NAMES ".charset($g).";\n\n";}}function
connect_error(){global$b,$g,$ni,$n,$ic;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));page_header('Select database',$n,false);echo"<p class='links'>\n";foreach(array('database'=>'Create database','privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$z=>$X){if(support($z))echo"<a href='".h(ME)."$z='>$X</a>\n";}echo"<p>".sprintf('%s version: %s through PHP extension %s',$ic[DRIVER],"<b>".h($g->server_info)."</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$ah=support("scheme");$lb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>":"")."<th>".'Database'." - <a href='".h(ME)."refresh=1'>".'Refresh'."</a>"."<td>".'Collation'."<td>".'Tables'."<td>".'Size'." - <a href='".h(ME)."dbsize=1'>".'Compute'."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$S){$Sg=h(ME)."db=".urlencode($l);$u=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$u):""),"<th><a href='$Sg' id='$u'>".h($l)."</a>";$d=h(db_collation($l,$lb));echo"<td>".(support("database")?"<a href='$Sg".($ah?"&amp;ns=":"")."&amp;database=' title='".'Alter database'."'>$d</a>":$d),"<td align='right'><a href='$Sg&amp;schema=' id='tables-".h($l)."' title='".'Database schema'."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".'Drop'."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$ni'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")){if(DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header('Schema'.": ".h($_GET["ns"]),'Invalid schema.',true);page_footer("ns");exit;}}}$pf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($Cb){$this->size+=strlen($Cb);fwrite($this->handler,$Cb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$_c="'(?:''|[^'\\\\]|\\\\.)*'";$Td="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$m->select($a,$L,array(where($_GET,$p)),$L);$J=($H?$H->fetch_row():array());echo$m->value($J[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);$D=$b->tableName($R);page_header(($p&&is_view($R)?$R['Engine']=='materialized view'?'Materialized view':'View':'Table').": ".($D!=""?$D:h($a)),$n);$b->selectLinks($R);$rb=$R["Comment"];if($rb!="")echo"<p class='nowrap'>".'Comment'.": ".h($rb)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".'Indexes'."</h3>\n";$x=indexes($a);if($x)$b->tableIndexesPrint($x);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Alter indexes'."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".'Foreign keys'."</h3>\n";$hd=foreign_keys($a);if($hd){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'."<td></thead>\n";foreach($hd
as$D=>$r){echo"<tr title='".h($D)."'>","<th><i>".implode("</i>, <i>",array_map('h',$r["source"]))."</i>","<td><a href='".h($r["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($r["db"]),ME):($r["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($r["ns"]),ME):ME))."table=".urlencode($r["table"])."'>".($r["db"]!=""?"<b>".h($r["db"])."</b>.":"").($r["ns"]!=""?"<b>".h($r["ns"])."</b>.":"").h($r["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$r["target"]))."</i>)","<td>".h($r["on_delete"])."\n","<td>".h($r["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($D)).'">'.'Alter'.'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Add foreign key'."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".'Triggers'."</h3>\n";$zi=triggers($a);if($zi){echo"<table cellspacing='0'>\n";foreach($zi
as$z=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($z)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($z))."'>".'Alter'."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Add trigger'."</a>\n";}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Qh=array();$Rh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Ce,PREG_SET_ORDER);foreach($Ce
as$t=>$C){$Qh[$C[1]]=array($C[2],$C[3]);$Rh[]="\n\t'".js_escape($C[1])."': [ $C[2], $C[3] ]";}$oi=0;$Pa=-1;$Zg=array();$Eg=array();$re=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$eg=0;$Zg[$Q]["fields"]=array();foreach(fields($Q)as$D=>$o){$eg+=1.25;$o["pos"]=$eg;$Zg[$Q]["fields"][$D]=$o;}$Zg[$Q]["pos"]=($Qh[$Q]?$Qh[$Q]:array($oi,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$pe=$Pa;if($Qh[$Q][1]||$Qh[$X["table"]][1])$pe=min(floatval($Qh[$Q][1]),floatval($Qh[$X["table"]][1]))-1;else$Pa-=.1;while($re[(string)$pe])$pe-=.0001;$Zg[$Q]["references"][$X["table"]][(string)$pe]=array($X["source"],$X["target"]);$Eg[$X["table"]][$Q][(string)$pe]=$X["target"];$re[(string)$pe]=true;}}$oi=max($oi,$Zg[$Q]["pos"][0]+2.5+$eg);}echo'<div id="schema" style="height: ',$oi,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Rh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$oi,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($Zg
as$D=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($D).'"><b>'.h($D)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$Xh=>$Fg){foreach($Fg
as$pe=>$Bg){$qe=$pe-$Qh[$D][1];$t=0;foreach($Bg[0]as$vh)echo"\n<div class='references' title='".h($Xh)."' id='refs$pe-".($t++)."' style='left: $qe"."em; top: ".$Q["fields"][$vh]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$qe)."em;'></div></div>";}}foreach((array)$Eg[$D]as$Xh=>$Fg){foreach($Fg
as$pe=>$f){$qe=$pe-$Qh[$D][1];$t=0;foreach($f
as$Wh)echo"\n<div class='references' title='".h($Xh)."' id='refd$pe-".($t++)."' style='left: $qe"."em; top: ".$Q["fields"][$Wh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.8.1")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$qe)."em;'></div></div>";}}echo"\n</div>\n";}foreach($Zg
as$D=>$Q){foreach((array)$Q["references"]as$Xh=>$Fg){foreach($Fg
as$pe=>$Bg){$Qe=$oi;$Ge=-10;foreach($Bg[0]as$z=>$vh){$fg=$Q["pos"][0]+$Q["fields"][$vh]["pos"];$gg=$Zg[$Xh]["pos"][0]+$Zg[$Xh]["fields"][$Bg[1][$z]]["pos"];$Qe=min($Qe,$fg,$gg);$Ge=max($Ge,$fg,$gg);}echo"<div class='references' id='refl$pe' style='left: $pe"."em; top: $Qe"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Ge-$Qe)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Permanent link</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Fb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$z)$Fb.="&$z=".urlencode($_POST[$z]);cookie("adminer_export",substr($Fb,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Mc=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$be=preg_match('~sql~',$_POST["format"]);if($be){echo"-- Adminer $ia ".$ic[DRIVER]." ".str_replace("\n"," ",$g->server_info)." dump\n\n";if($y=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
".($_POST["data_style"]?"SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$g->query("SET time_zone = '+00:00'");$g->query("SET sql_mode = ''");}}$Hh=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($g->select_db($l)){if($be&&preg_match('~CREATE~',$Hh)&&($i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($i);if($Hh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$i;\n";}if($be){if($Hh)echo
use_sql($l).";\n\n";$If="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Tg){foreach(get_rows("SHOW $Tg STATUS WHERE Db = ".q($l),null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE $Tg ".idf_escape($J["Name"]),2));set_utf8mb4($i);$If.=($Hh!='DROP+CREATE'?"DROP $Tg IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($i);$If.=($Hh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}if($If)echo"DELIMITER ;;\n\n$If"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Yi=array();foreach(table_status('',true)as$D=>$R){$Q=(DB==""||in_array($D,(array)$_POST["tables"]));$Pb=(DB==""||in_array($D,(array)$_POST["data"]));if($Q||$Pb){if($Mc=="tar"){$ki=new
TmpFile;ob_start(array($ki,'write'),1e5);}$b->dumpTable($D,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$Yi[]=$D;elseif($Pb){$p=fields($D);$b->dumpData($D,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($D));}if($be&&$_POST["triggers"]&&$Q&&($zi=trigger_sql($D)))echo"\nDELIMITER ;;\n$zi\nDELIMITER ;\n";if($Mc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$D.csv",$ki);}elseif($be)echo"\n";}}if(function_exists('foreign_keys_sql')){foreach(table_status('',true)as$D=>$R){$Q=(DB==""||in_array($D,(array)$_POST["tables"]));if($Q&&!is_view($R))echo
foreign_keys_sql($D);}}foreach($Yi
as$Xi)$b->dumpTable($Xi,$_POST["table_style"],1);if($Mc=="tar")echo
pack("x512");}}}if($be)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header('Export',$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
';$Tb=array('','USE','DROP+CREATE','CREATE');$Sh=array('','DROP+CREATE','CREATE');$Qb=array('','TRUNCATE+INSERT','INSERT');if($y=="sql")$Qb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".'Output'."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($y=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$Tb,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],'Routines'):"").(support("event")?checkbox("events",1,$J["events"],'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Sh,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$J["triggers"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$Qb,$J["data_style"]),'</table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="',$ni,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$jg=array();if(DB!=""){$cb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$cb>".'Tables'."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".'Data'."<input type='checkbox' id='check-data'$cb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$Yi="";$Th=tables_list();foreach($Th
as$D=>$T){$ig=preg_replace('~_.*~','',$D);$cb=($a==""||$a==(substr($a,-1)=="%"?"$ig%":$D));$mg="<tr><td>".checkbox("tables[]",$D,$cb,$D,"","block");if($T!==null&&!preg_match('~table~i',$T))$Yi.="$mg\n";else
echo"$mg<td align='right'><label class='block'><span id='Rows-".h($D)."'></span>".checkbox("data[]",$D,$cb)."</label>\n";$jg[$ig]++;}echo$Yi;if($Th)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".'Database'."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$ig=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$ig%",$l,"","block")."\n";$jg[$ig]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Zc=true;foreach($jg
as$z=>$X){if($z!=""&&$X>1){echo($Zc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$z%")."'>".h($z)."</a>";$Zc=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');echo'<p class="links"><a href="'.h(ME).'user=">'.'Create user'."</a>";$H=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$od=$H;if(!$H)$H=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($od?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Username'."<th>".'Server'."<th></thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.'Edit'."</a>\n";if(!$od||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".'Edit'."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$Bd=&get_session("queries");$Ad=&$Bd[DB];if(!$n&&$_POST["clear"]){$Ad=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?'Import':'SQL command'),$n);if(!$n&&$_POST){$ld=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$zh=$b->importServerPath();$ld=@fopen((file_exists($zh)?$zh:"compress.zlib://$zh.gz"),"rb");$G=($ld?fread($ld,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$ug=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$Ad||reset(end($Ad))!=$ug){restart_session();$Ad[]=array($ug,time());set_session("queries",$Bd);stop_session();}}$wh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$ac=";";$hf=0;$xc=true;$h=connect();if(is_object($h)&&DB!=""){$h->select_db(DB);if($_GET["ns"]!="")set_schema($_GET["ns"],$h);}$qb=0;$Bc=array();$Pf='[\'"'.($y=="sql"?'`#':($y=="sqlite"?'`[':($y=="mssql"?'[':''))).']|/\*|-- |$'.($y=="pgsql"?'|\$[^$]*\$':'');$pi=microtime(true);parse_str($_COOKIE["adminer_export"],$xa);$oc=$b->dumpFormat();unset($oc["sql"]);while($G!=""){if(!$hf&&preg_match("~^$wh*+DELIMITER\\s+(\\S+)~i",$G,$C)){$ac=$C[1];$G=substr($G,strlen($C[0]));}else{preg_match('('.preg_quote($ac)."\\s*|$Pf)",$G,$C,PREG_OFFSET_CAPTURE,$hf);list($jd,$eg)=$C[0];if(!$jd&&$ld&&!feof($ld))$G.=fread($ld,1e5);else{if(!$jd&&rtrim($G)=="")break;$hf=$eg+strlen($jd);if($jd&&rtrim($jd)!=$ac){while(preg_match('('.($jd=='/*'?'\*/':($jd=='['?']':(preg_match('~^-- |^#~',$jd)?"\n":preg_quote($jd)."|\\\\."))).'|$)s',$G,$C,PREG_OFFSET_CAPTURE,$hf)){$Xg=$C[0][0];if(!$Xg&&$ld&&!feof($ld))$G.=fread($ld,1e5);else{$hf=$C[0][1]+strlen($Xg);if($Xg[0]!="\\")break;}}}else{$xc=false;$ug=substr($G,0,$eg);$qb++;$mg="<pre id='sql-$qb'><code class='jush-$y'>".$b->sqlCommandQuery($ug)."</code></pre>\n";if($y=="sqlite"&&preg_match("~^$wh*+ATTACH\\b~i",$ug,$C)){echo$mg,"<p class='error'>".'ATTACH queries are not supported.'."\n";$Bc[]=" <a href='#sql-$qb'>$qb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$mg;ob_flush();flush();}$Ch=microtime(true);if($g->multi_query($ug)&&is_object($h)&&preg_match("~^$wh*+USE\\b~i",$ug))$h->query($ug);do{$H=$g->store_result();if($g->error){echo($_POST["only_errors"]?$mg:""),"<p class='error'>".'Error in query'.($g->errno?" ($g->errno)":"").": ".error()."\n";$Bc[]=" <a href='#sql-$qb'>$qb</a>";if($_POST["error_stops"])break
2;}else{$di=" <span class='time'>(".format_time($Ch).")</span>".(strlen($ug)<1000?" <a href='".h(ME)."sql=".urlencode(trim($ug))."'>".'Edit'."</a>":"");$za=$g->affected_rows;$bj=($_POST["only_errors"]?"":$m->warnings());$cj="warnings-$qb";if($bj)$di.=", <a href='#$cj'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$cj');","");$Jc=null;$Kc="explain-$qb";if(is_object($H)){$_=$_POST["limit"];$Bf=select($H,$h,array(),$_);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$df=$H->num_rows;echo"<p>".($df?($_&&$df>$_?sprintf('%d / ',$_):"").lang(array('%d row','%d rows'),$df):""),$di;if($h&&preg_match("~^($wh|\\()*+SELECT\\b~i",$ug)&&($Jc=explain($h,$ug)))echo", <a href='#$Kc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Kc');","");$u="export-$qb";echo", <a href='#$u'>".'Export'."</a>".script("qsl('a').onclick = partial(toggle, '$u');","")."<span id='$u' class='hidden'>: ".html_select("output",$b->dumpOutput(),$xa["output"])." ".html_select("format",$oc,$xa["format"])."<input type='hidden' name='query' value='".h($ug)."'>"." <input type='submit' name='export' value='".'Export'."'><input type='hidden' name='token' value='$ni'></span>\n"."</form>\n";}}else{if(preg_match("~^$wh*+(CREATE|DROP|ALTER)$wh++(DATABASE|SCHEMA)\\b~i",$ug)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$za)."$di\n";}echo($bj?"<div id='$cj' class='hidden'>\n$bj</div>\n":"");if($Jc){echo"<div id='$Kc' class='hidden'>\n";select($Jc,$h,$Bf);echo"</div>\n";}}$Ch=microtime(true);}while($g->next_result());}$G=substr($G,$hf);$hf=0;}}}}if($xc)echo"<p class='message'>".'No commands to execute.'."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d query executed OK.','%d queries executed OK.'),$qb-count($Bc))," <span class='time'>(".format_time($pi).")</span>\n";}elseif($Bc&&$qb>1)echo"<p class='error'>".'Error in query'.": ".implode("",$Bc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Hc="<input type='submit' value='".'Execute'."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$ug=$_GET["sql"];if($_POST)$ug=$_POST["query"];elseif($_GET["history"]=="all")$ug=$Ad;elseif($_GET["history"]!="")$ug=$Ad[$_GET["history"]][0];echo"<p>";textarea("query",$ug,20);echo
script(($_POST?"":"qs('textarea').focus();\n")."qs('#form').onsubmit = partial(sqlSubmit, qs('#form'), '".js_escape(remove_from_uri("sql|limit|error_stops|only_errors|history"))."');"),"<p>$Hc\n",'Limit rows'.": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".'File upload'."</legend><div>";$ud=(extension_loaded("zlib")?"[.gz]":"");echo(ini_bool("file_uploads")?"SQL$ud (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Hc":'File uploads are disabled.'),"</div></fieldset>\n";$Id=$b->importServerPath();if($Id){echo"<fieldset><legend>".'From server'."</legend><div>",sprintf('Webserver file %s',"<code>".h($Id)."$ud</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n";}echo"<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])||$_GET["error_stops"]),'Stop on error')."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])||$_GET["only_errors"]),'Show only errors')."\n","<input type='hidden' name='token' value='$ni'>\n";if(!isset($_GET["import"])&&$Ad){print_fieldset("history",'History',$_GET["history"]!="");for($X=end($Ad);$X;$X=prev($Ad)){$z=key($Ad);list($ug,$di,$sc)=$X;echo'<a href="'.h(ME."sql=&history=$z").'">'.'Edit'."</a>"." <span class='time' title='".@date('Y-m-d',$di)."'>".@date("H:i:s",$di)."</span>"." <code class='jush-$y'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$ug)))),80,"</code>").($sc?" <span class='time'>($sc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Edit all'."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Ii=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$D=>$o){if(!isset($o["privileges"][$Ii?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$D]);}if($_POST&&!$n&&!isset($_GET["select"])){$B=$_POST["referer"];if($_POST["insert"])$B=($Ii?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$B))$B=ME."select=".urlencode($a);$x=indexes($a);$Di=unique_array($_GET["where"],$x);$xg="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($B,'Item has been deleted.',$m->delete($a,$xg,!$Di));else{$N=array();foreach($p
as$D=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($D)]=$X;}if($Ii){if(!$N)redirect($B);queries_redirect($B,'Item has been updated.',$m->update($a,$N,$xg,!$Di));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$H=$m->insert($a,$N);$oe=($H?last_id():0);queries_redirect($B,sprintf('Item%s has been inserted.',($oe?" $oe":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($p
as$D=>$o){if(isset($o["privileges"]["select"])){$Fa=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Fa="''";if($y=="sql"&&preg_match("~enum|set~",$o["type"]))$Fa="1*".idf_escape($D);$L[]=($Fa?"$Fa AS ":"").idf_escape($D);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$m->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$n=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$p){if(!$Z){$H=$m->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($m->primary=>"");}if($J){foreach($J
as$z=>$X){if(!$Z)$J[$z]=null;$p[$z]=array("field"=>$z,"null"=>($z!=$m->primary),"auto_increment"=>($z==$m->primary));}}}edit_form($a,$p,$J,$Ii);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Rf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$z)$Rf[$z]=$z;$Dg=referencable_primary($a);$hd=array();foreach($Dg
as$Oh=>$o)$hd[str_replace("`","``",$Oh)."`".str_replace("`","``",$o["field"])]=$Oh;$Ef=array();$R=array();if($a!=""){$Ef=fields($a);$R=table_status($a);if(!$R)$n='No tables.';}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST)set_adminer_settings(array("comments"=>$_POST["comments"],"defaults"=>$_POST["defaults"]));if($_POST&&!process_fields($J["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),'Table has been dropped.',drop_tables(array($a)));else{$p=array();$Ca=array();$Mi=false;$fd=array();$Df=reset($Ef);$Aa=" FIRST";foreach($J["fields"]as$z=>$o){$r=$hd[$o["type"]];$_i=($r!==null?$Dg[$r]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($z==$J["auto_increment_col"])$o["auto_increment"]=true;$rg=process_field($o,$_i);$Ca[]=array($o["orig"],$rg,$Aa);if(!$Df||$rg!=process_field($Df,$Df)){$p[]=array($o["orig"],$rg,$Aa);if($o["orig"]!=""||$Aa)$Mi=true;}if($r!==null)$fd[idf_escape($o["field"])]=($a!=""&&$y!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$hd[$o["type"]],'source'=>array($o["field"]),'target'=>array($_i["field"]),'on_delete'=>$o["on_delete"],));$Aa=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Mi=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$Df=next($Ef);if(!$Df)$Aa="";}}$Tf="";if($Rf[$J["partition_by"]]){$Uf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$z=>$X){$Y=$J["partition_values"][$z];$Uf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Tf.="\nPARTITION BY $J[partition_by]($J[partition])".($Uf?" (".implode(",",$Uf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$Tf.="\nREMOVE PARTITIONING";$Ke='Table has been altered.';if($a==""){cookie("adminer_engine",$J["Engine"]);$Ke='Table has been created.';}$D=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($D),$Ke,alter_table($a,$D,($y=="sqlite"&&($Mi||$fd)?$Ca:$p),$fd,($J["Comment"]!=$R["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$R["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$R["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Tf));}}page_header(($a!=""?'Alter table':'Create table'),$n,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($U["int"])?"int":(isset($U["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$J=$R;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($Ef
as$o){$o["has_default"]=isset($o["default"]);$J["fields"][]=$o;}if(support("partitioning")){$md="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $md ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Uf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $md AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Uf[""]="";$J["partition_names"]=array_keys($Uf);$J["partition_values"]=array_values($Uf);}}}$lb=collations();$zc=engines();foreach($zc
as$yc){if(!strcasecmp($yc,$J["Engine"])){$J["Engine"]=$yc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo'Table name: <input name="name" data-maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($zc?"<select name='Engine'>".optionlist(array(""=>"(".'engine'.")")+$zc,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($lb&&!preg_match("~sqlite|mssql~",$y)?html_select("Collation",array(""=>"(".'collation'.")")+$lb,$J["Collation"]):""),' <input type="submit" value="Save">
';}echo'
';if(support("columns")){echo'<div class="scrollable">
<table cellspacing="0" id="edit-fields" class="nowrap">
';edit_fields($J["fields"],$lb,"TABLE",$hd);echo'</table>
',script("editFields();"),'</div>
<p>
Auto Increment: <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,($_POST?$_POST["defaults"]:adminer_setting("defaults")),'Default values',"columnShow(this.checked, 5)","jsonly"),(support("comment")?checkbox("comments",1,($_POST?$_POST["comments"]:adminer_setting("comments")),'Comment',"editingCommentsClick(this, true);","jsonly").' <input name="Comment" value="'.h($J["Comment"]).'" data-maxlength="'.(min_version(5.5)?2048:60).'">':''),'<p>
<input type="submit" value="Save">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}if(support("partitioning")){$Sf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",'Partition by',$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Rf,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
Partitions: <input type="number" name="partitions" class="size',($Sf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Sf?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($J["partition_names"]as$z=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($z==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$z]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Ld=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$R["Engine"]))$Ld[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$R["Engine"]))$Ld[]="SPATIAL";$x=indexes($a);$kg=array();if($y=="mongo"){$kg=$x["_id_"];unset($Ld[0]);unset($x["_id_"]);}$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$w){$D=$w["name"];if(in_array($w["type"],$Ld)){$f=array();$ue=array();$cc=array();$N=array();ksort($w["columns"]);foreach($w["columns"]as$z=>$e){if($e!=""){$te=$w["lengths"][$z];$bc=$w["descs"][$z];$N[]=idf_escape($e).($te?"(".(+$te).")":"").($bc?" DESC":"");$f[]=$e;$ue[]=($te?$te:null);$cc[]=$bc;}}if($f){$Ic=$x[$D];if($Ic){ksort($Ic["columns"]);ksort($Ic["lengths"]);ksort($Ic["descs"]);if($w["type"]==$Ic["type"]&&array_values($Ic["columns"])===$f&&(!$Ic["lengths"]||array_values($Ic["lengths"])===$ue)&&array_values($Ic["descs"])===$cc){unset($x[$D]);continue;}}$c[]=array($w["type"],$D,$N);}}}foreach($x
as$D=>$Ic)$c[]=array($Ic["type"],$D,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'Indexes have been altered.',alter_indexes($a,$c));}page_header('Indexes',$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$z=>$w){if($w["columns"][count($w["columns"])]!="")$J["indexes"][$z]["columns"][]="";}$w=end($J["indexes"]);if($w["type"]||array_filter($w["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($x
as$z=>$w){$x[$z]["name"]=$z;$x[$z]["columns"][]="";}$x[]=array("columns"=>array(1=>""));$J["indexes"]=$x;}echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">Index Type
<th><input type="submit" class="wayoff">Column (length)
<th id="label-name">Name
<th><noscript>',"<input type='image' class='icon' name='add[0]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".'Add next'."'>",'</noscript>
</thead>
';if($kg){echo"<tr><td>PRIMARY<td>";foreach($kg["columns"]as$z=>$e){echo
select_input(" disabled",$p,$e),"<label><input disabled type='checkbox'>".'descending'."</label> ";}echo"<td><td>\n";}$ee=1;foreach($J["indexes"]as$w){if(!$_POST["drop_col"]||$ee!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$ee][type]",array(-1=>"")+$Ld,$w["type"],($ee==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($w["columns"]);$t=1;foreach($w["columns"]as$z=>$e){echo"<span>".select_input(" name='indexes[$ee][columns][$t]' title='".'Column'."'",($p?array_combine($p,$p):$p),$e,"partial(".($t==count($w["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($y=="sql"?"":$_GET["indexes"]."_")."')"),($y=="sql"||$y=="mssql"?"<input type='number' name='indexes[$ee][lengths][$t]' class='size' value='".h($w["lengths"][$z])."' title='".'Length'."'>":""),(support("descidx")?checkbox("indexes[$ee][descs][$t]",1,$w["descs"][$z],'descending'):"")," </span>";$t++;}echo"<td><input name='indexes[$ee][name]' value='".h($w["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$ee]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.8.1")."' alt='x' title='".'Remove'."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$ee++;}echo'</table>
</div>
<p>
<input type="submit" value="Save">
<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$D=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$D){if(DB!=""){$_GET["db"]=$D;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($D),'Database has been renamed.',rename_database($D,$J["collation"]));}else{$k=explode("\n",str_replace("\r","",$D));$Ih=true;$ne="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$J["collation"]))$Ih=false;$ne=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($ne),'Database has been created.',$Ih);}}else{if(!$J["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($D).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$n,array(),h(DB));$lb=collations();$D=DB;if($_POST)$D=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$lb);elseif($y=="sql"){foreach(get_vals("SHOW GRANTS")as$od){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\.\*)?~',$od,$C)&&$C[1]){$D=stripcslashes(idf_unescape("`$C[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($D,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($D).'</textarea><br>':'<input name="name" id="name" value="'.h($D).'" data-maxlength="64" autocapitalize="off">')."\n".($lb?html_select("collation",array(""=>"(".'collation'.")")+$lb,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if(DB!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.8.1")."' alt='+' title='".'Add next'."'>\n";echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$n){$A=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$A,'Schema has been dropped.');else{$D=trim($J["name"]);$A.=urlencode($D);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($D),$A,'Schema has been created.');elseif($_GET["ns"]!=$D)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($D),$A,'Schema has been altered.');else
redirect($A);}}page_header($_GET["ns"]!=""?'Alter schema':'Create schema',$n);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header('Call'.": ".h($da),$n);$Tg=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Jd=array();$If=array();foreach($Tg["fields"]as$t=>$o){if(substr($o["inout"],-3)=="OUT")$If[$t]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Jd[]=$t;}if(!$n&&$_POST){$Xa=array();foreach($Tg["fields"]as$z=>$o){if(in_array($z,$Jd)){$X=process_input($o);if($X===false)$X="''";if(isset($If[$z]))$g->query("SET @".idf_escape($o["field"])." = $X");}$Xa[]=(isset($If[$z])?"@".idf_escape($o["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$Xa).")";$Ch=microtime(true);$H=$g->multi_query($G);$za=$g->affected_rows;echo$b->selectQuery($G,$Ch,!$H);if(!$H)echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$H=$g->store_result();if(is_object($H))select($H,$h);else
echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$za)." <span class='time'>".@date("H:i:s")."</span>\n";}while($g->next_result());if($If)select($g->query("SELECT ".implode(", ",$If)));}}echo'
<form action="" method="post">
';if($Jd){echo"<table cellspacing='0' class='layout'>\n";foreach($Jd
as$z){$o=$Tg["fields"][$z];$D=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$D];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$D]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Call">
<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$D=$_GET["name"];$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Ke=($_POST["drop"]?'Foreign key has been dropped.':($D!=""?'Foreign key has been altered.':'Foreign key has been created.'));$B=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Wh=array();foreach($J["source"]as$z=>$X)$Wh[$z]=$J["target"][$z];$J["target"]=$Wh;}if($y=="sqlite")queries_redirect($B,$Ke,recreate_table($a,$a,array(),array(),array(" $D"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$jc="\nDROP ".($y=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($D);if($_POST["drop"])query_redirect($c.$jc,$B,$Ke);else{query_redirect($c.($D!=""?"$jc,":"")."\nADD".format_foreign_key($J),$B,$Ke);$n='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$n";}}}page_header('Foreign key',$n,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($D!=""){$hd=foreign_keys($a);$J=$hd[$D];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}echo'
<form action="" method="post">
';$vh=array_keys(fields($a));if($J["db"]!="")$g->select_db($J["db"]);if($J["ns"]!="")set_schema($J["ns"]);$Cg=array_keys(array_filter(table_status('',true),'fk_support'));$Wh=array_keys(fields(in_array($J["table"],$Cg)?$J["table"]:reset($Cg)));$qf="this.form['change-js'].value = '1'; this.form.submit();";echo"<p>".'Target table'.": ".html_select("table",$Cg,$J["table"],$qf)."\n";if($y=="pgsql")echo'Schema'.": ".html_select("ns",$b->schemas(),$J["ns"]!=""?$J["ns"]:$_GET["ns"],$qf);elseif($y!="sqlite"){$Ub=array();foreach($b->databases()as$l){if(!information_schema($l))$Ub[]=$l;}echo'DB'.": ".html_select("db",$Ub,$J["db"]!=""?$J["db"]:$_GET["db"],$qf);}echo'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">Source<th id="label-target">Target</thead>
';$ee=0;foreach($J["source"]as$z=>$X){echo"<tr>","<td>".html_select("source[".(+$z)."]",array(-1=>"")+$vh,$X,($ee==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$z)."]",$Wh,$J["target"][$z],1,"label-target");$ee++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$pf),$J["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$pf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"https://docs.oracle.com/cd/B19306_01/server.102/b14200/clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';if($D!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$D));}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$Ff="VIEW";if($y=="pgsql"&&$a!=""){$O=table_status($a);$Ff=strtoupper($O["Engine"]);}if($_POST&&!$n){$D=trim($J["name"]);$Fa=" AS\n$J[select]";$B=ME."table=".urlencode($D);$Ke='View has been altered.';$T=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$D&&$y!="sqlite"&&$T=="VIEW"&&$Ff=="VIEW")query_redirect(($y=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($D).$Fa,$B,$Ke);else{$Yh=$D."_adminer_".uniqid();drop_create("DROP $Ff ".table($a),"CREATE $T ".table($D).$Fa,"DROP $T ".table($D),"CREATE $T ".table($Yh).$Fa,"DROP $T ".table($Yh),($_POST["drop"]?substr(ME,0,-1):$B),'View has been dropped.',$Ke,'View has been created.',$a,$D);}}if(!$_POST&&$a!=""){$J=view($a);$J["name"]=$a;$J["materialized"]=($Ff!="VIEW");if(!$n)$n=error();}page_header(($a!=""?'Alter view':'Create view'),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],'Materialized view'):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="Save">
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Wd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Eh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'Event has been dropped.');elseif(in_array($J["INTERVAL_FIELD"],$Wd)&&isset($Eh[$J["STATUS"]])){$Yg="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'Event has been altered.':'Event has been created.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Yg.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$Yg)."\n".$Eh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Alter event'.": ".h($aa):'Create event'),$n);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" data-maxlength="64" autocapitalize="off">
<tr><th title="datetime">Start<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">End<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>Every<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Wd,$J["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$Eh,$J["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" data-maxlength="64">
<tr><th><td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Save">
';if($aa!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$aa));}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Tg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$n){$Cf=routine($_GET["procedure"],$Tg);$Yh="$J[name]_adminer_".uniqid();drop_create("DROP $Tg ".routine_id($da,$Cf),create_routine($Tg,$J),"DROP $Tg ".routine_id($J["name"],$J),create_routine($Tg,array("name"=>$Yh)+$J),"DROP $Tg ".routine_id($Yh,$J),substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($da):(isset($_GET["function"])?'Create function':'Create procedure')),$n);if(!$_POST&&$da!=""){$J=routine($_GET["procedure"],$Tg);$J["name"]=$da;}$lb=get_vals("SHOW CHARACTER SET");sort($lb);$Ug=routine_languages();echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',($Ug?'Language'.": ".html_select("language",$Ug,$J["language"])."\n":""),'<input type="submit" value="Save">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$lb,$Tg);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$J["returns"],$lb,array(),($y=="pgsql"?array("void","trigger"):array()));}echo'</table>
',script("editFields();"),'</div>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="Save">
';if($da!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$da));}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$n){$A=substr(ME,0,-1);$D=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$A,'Sequence has been dropped.');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($D),$A,'Sequence has been created.');elseif($fa!=$D)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($D),$A,'Sequence has been altered.');else
redirect($A);}page_header($fa!=""?'Alter sequence'.": ".h($fa):'Create sequence',$n);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="Save">
';if($fa!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$fa))."\n";echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$n){$A=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$A,'Type has been dropped.');else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$A,'Type has been created.');}page_header($ga!=""?'Alter type'.": ".h($ga):'Create type',$n);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".'Save'."'>\n";}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$D=$_GET["name"];$yi=trigger_options();$J=(array)trigger($D,$a)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$yi["Timing"])&&in_array($_POST["Event"],$yi["Event"])&&in_array($_POST["Type"],$yi["Type"])){$of=" ON ".table($a);$jc="DROP TRIGGER ".idf_escape($D).($y=="pgsql"?$of:"");$B=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($jc,$B,'Trigger has been dropped.');else{if($D!="")queries($jc);queries_redirect($B,($D!=""?'Trigger has been altered.':'Trigger has been created.'),queries(create_trigger($of,$_POST)));if($D!="")queries(create_trigger($of,$J+array("Type"=>reset($yi["Type"]))));}}$J=$_POST;}page_header(($D!=""?'Alter trigger'.": ".h($D):'Create trigger'),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0" class="layout">
<tr><th>Time<td>',html_select("Timing",$yi["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>Event<td>',html_select("Event",$yi["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$yi["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>Type<td>',html_select("Type",$yi["Type"],$J["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($J["Trigger"]),'" data-maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="Save">
';if($D!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$D));}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$pg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Db)$pg[$Db][$J["Privilege"]]=$J["Comment"];}$pg["Server Admin"]+=$pg["File access on server"];$pg["Databases"]["Create routine"]=$pg["Procedures"]["Create routine"];unset($pg["Procedures"]["Create routine"]);$pg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$pg["Columns"][$X]=$pg["Tables"][$X];unset($pg["Server Admin"]["Usage"]);foreach($pg["Tables"]as$z=>$X)unset($pg["Databases"][$z]);$Xe=array();if($_POST){foreach($_POST["objects"]as$z=>$X)$Xe[$X]=(array)$Xe[$X]+(array)$_POST["grants"][$z];}$pd=array();$mf="";if(isset($_GET["host"])&&($H=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$C)&&preg_match_all('~ *([^(,]*[^ ,(])( *\([^)]+\))?~',$C[1],$Ce,PREG_SET_ORDER)){foreach($Ce
as$X){if($X[1]!="USAGE")$pd["$C[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$pd["$C[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$C))$mf=$C[1];}}if($_POST&&!$n){$nf=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $nf",ME."privileges=",'User has been dropped.');else{$Ze=q($_POST["user"])."@".q($_POST["host"]);$Wf=$_POST["pass"];if($Wf!=''&&!$_POST["hashed"]&&!min_version(8)){$Wf=$g->result("SELECT PASSWORD(".q($Wf).")");$n=!$Wf;}$Jb=false;if(!$n){if($nf!=$Ze){$Jb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $Ze IDENTIFIED BY ".(min_version(8)?"":"PASSWORD ").q($Wf));$n=!$Jb;}elseif($Wf!=$mf)queries("SET PASSWORD FOR $Ze = ".q($Wf));}if(!$n){$Qg=array();foreach($Xe
as$ff=>$od){if(isset($_GET["grant"]))$od=array_filter($od);$od=array_keys($od);if(isset($_GET["grant"]))$Qg=array_diff(array_keys(array_filter($Xe[$ff],'strlen')),$od);elseif($nf==$Ze){$kf=array_keys((array)$pd[$ff]);$Qg=array_diff($kf,$od);$od=array_diff($od,$kf);unset($pd[$ff]);}if(preg_match('~^(.+)\s*(\(.*\))?$~U',$ff,$C)&&(!grant("REVOKE",$Qg,$C[2]," ON $C[1] FROM $Ze")||!grant("GRANT",$od,$C[2]," ON $C[1] TO $Ze"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($nf!=$Ze)queries("DROP USER $nf");elseif(!isset($_GET["grant"])){foreach($pd
as$ff=>$Qg){if(preg_match('~^(.+)(\(.*\))?$~U',$ff,$C))grant("REVOKE",array_keys($Qg),$C[2]," ON $C[1] FROM $Ze");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$n);if($Jb)$g->query("DROP USER $Ze");}}page_header((isset($_GET["host"])?'Username'.": ".h("$ha@$_GET[host]"):'Create user'),$n,array("privileges"=>array('','Privileges')));if($_POST){$J=$_POST;$pd=$Xe;}else{$J=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$mf;if($mf!="")$J["hashed"]=true;$pd[(DB==""||$pd?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Server<td><input name="host" data-maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>Username<td><input name="user" data-maxlength="80" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>Password<td><input name="pass" id="pass" value="',h($J["pass"]),'" autocomplete="new-password">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo(min_version(8)?"":checkbox("hashed",1,$J["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);")),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".'Privileges'.doc_link(array('sql'=>"grant.html#priv_level"));$t=0;foreach($pd
as$ff=>$od){echo'<th>'.($ff!="*.*"?"<input name='objects[$t]' value='".h($ff)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$t]' value='*.*' size='10'>*.*");$t++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$Db=>$bc){foreach((array)$pg[$Db]as$og=>$rb){echo"<tr".odd()."><td".($bc?">$bc<td":" colspan='2'").' lang="en" title="'.h($rb).'">'.h($og);$t=0;foreach($pd
as$ff=>$od){$D="'grants[$t][".h(strtoupper($og))."]'";$Y=$od[strtoupper($og)];if($Db=="Server Admin"&&$ff!=(isset($pd["*.*"])?"*.*":".*"))echo"<td>";elseif(isset($_GET["grant"]))echo"<td><select name=$D><option><option value='1'".($Y?" selected":"").">".'Grant'."<option value='0'".($Y=="0"?" selected":"").">".'Revoke'."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$D value='1'".($Y?" checked":"").($og=="All privileges"?" id='grants-$t-all'>":">".($og=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$t-all'); };"))),"</label>";}$t++;}}}echo"</table>\n",'<p>
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")){if($_POST&&!$n){$je=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$je++;}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$je),$je||!$_POST["kill"]);}}page_header('Process list',$n);echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$t=-1;foreach(process_list()as$t=>$J){if(!$t){echo"<thead><tr lang='en'>".(support("kill")?"<th>":"");foreach($J
as$z=>$X)echo"<th>$z".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($z),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"REFRN30223",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$y=="sql"?"Id":"pid"],0):"");foreach($J
as$z=>$X)echo"<td>".(($y=="sql"&&$z=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($y=="pgsql"&&$z=="current_query"&&$X!="<IDLE>")||($y=="oracle"&&$z=="sql_text"&&$X!="")?"<code class='jush-$y'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.'Clone'.'</a>':h($X));echo"\n";}echo'</table>
</div>
<p>
';if(support("kill")){echo($t+1)."/".sprintf('%d in total',max_connections()),"<p><input type='submit' value='".'Kill'."'>\n";}echo'<input type="hidden" name="token" value="',$ni,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$x=indexes($a);$p=fields($a);$hd=column_foreign_keys($a);$if=$R["Oid"];parse_str($_COOKIE["adminer_import"],$ya);$Rg=array();$f=array();$ci=null;foreach($p
as$z=>$o){$D=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$D!=""){$f[$z]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($o))$ci=$b->selectLengthProcess();}$Rg+=$o["privileges"];}list($L,$qd)=$b->selectColumnsProcess($f,$x);$ae=count($qd)<count($L);$Z=$b->selectSearchProcess($p,$x);$zf=$b->selectOrderProcess($p,$x);$_=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ei=>$J){$Fa=convert_field($p[key($J)]);$L=array($Fa?$Fa:idf_escape(key($J)));$Z[]=where_check($Ei,$p);$I=$m->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$kg=$Gi=null;foreach($x
as$w){if($w["type"]=="PRIMARY"){$kg=array_flip($w["columns"]);$Gi=($L?$kg:array());foreach($Gi
as$z=>$X){if(in_array(idf_escape($z),$L))unset($Gi[$z]);}break;}}if($if&&!$kg){$kg=$Gi=array($if=>0);$x[]=array("type"=>"PRIMARY","columns"=>array($if));}if($_POST&&!$n){$hj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$db=array();foreach($_POST["check"]as$ab)$db[]=where_check($ab,$p);$hj[]="((".implode(") OR (",$db)."))";}$hj=($hj?"\nWHERE ".implode(" AND ",$hj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$md=($L?implode(", ",$L):"*").convert_fields($f,$p,$L)."\nFROM ".table($a);$sd=($qd&&$ae?"\nGROUP BY ".implode(", ",$qd):"").($zf?"\nORDER BY ".implode(", ",$zf):"");if(!is_array($_POST["check"])||$kg)$G="SELECT $md$hj$sd";else{$Ci=array();foreach($_POST["check"]as$X)$Ci[]="(SELECT".limit($md,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$sd,1).")";$G=implode(" UNION ALL ",$Ci);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$hd)){if($_POST["save"]||$_POST["delete"]){$H=true;$za=0;$N=array();if(!$_POST["delete"]){foreach($f
as$D=>$X){$X=process_input($p[$D]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($D)]=($X!==false?$X:idf_escape($D));}}if($_POST["delete"]||$N){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($kg&&is_array($_POST["check"]))||$ae){$H=($_POST["delete"]?$m->delete($a,$hj):($_POST["clone"]?queries("INSERT $G$hj"):$m->update($a,$N,$hj)));$za=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$dj="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$H=($_POST["delete"]?$m->delete($a,$dj,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$dj)):$m->update($a,$N,$dj,1)));if(!$H)break;$za+=$g->affected_rows;}}}$Ke=lang(array('%d item has been affected.','%d items have been affected.'),$za);if($_POST["clone"]&&$H&&$za==1){$oe=last_id();if($oe)$Ke=sprintf('Item%s has been inserted.'," $oe");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Ke,$H);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+click on a value to modify it.';else{$H=true;$za=0;foreach($_POST["val"]as$Ei=>$J){$N=array();foreach($J
as$z=>$X){$z=bracket_escape($z,1);$N[idf_escape($z)]=(preg_match('~char|text~',$p[$z]["type"])||$X!=""?$b->processInput($p[$z],$X):"NULL");}$H=$m->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ei,$p),!$ae&&!$kg," ");if(!$H)break;$za+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$za),$H);}}elseif(!is_string($Xc=get_file("csv_file",true)))$n=upload_error($Xc);elseif(!preg_match('~~u',$Xc))$n='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ya["output"])."&format=".urlencode($_POST["separator"]));$H=true;$nb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Xc,$Ce);$za=count($Ce[0]);$m->begin();$hh=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($Ce[0]as$z=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$hh]*)$hh~",$X.$hh,$De);if(!$z&&!array_diff($De[1],$nb)){$nb=$De[1];$za--;}else{$N=array();foreach($De[1]as$t=>$jb)$N[idf_escape($nb[$t])]=($jb==""&&$p[$nb[$t]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$jb))));$K[]=$N;}}$H=(!$K||$m->insertUpdate($a,$K,$kg));if($H)$H=$m->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$za),$H);$m->rollback();}}}$Oh=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Oh",$n);$N=null;if(isset($Rg["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($hd[$X["col"]]&&count($hd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$f&&support("table"))echo"<p class='error'>".'Unable to select the table'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$f);$b->selectSearchPrint($Z,$f,$x);$b->selectOrderPrint($zf,$f,$x);$b->selectLimitPrint($_);$b->selectLengthPrint($ci);$b->selectActionPrint($x);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$kd=$g->result(count_rows($a,$Z,$ae,$qd));$E=floor(max(0,$kd-1)/$_);}$ch=$L;$rd=$qd;if(!$ch){$ch[]="*";$Eb=convert_fields($f,$p,$L);if($Eb)$ch[]=substr($Eb,2);}foreach($L
as$z=>$X){$o=$p[idf_unescape($X)];if($o&&($Fa=convert_field($o)))$ch[$z]="$Fa AS $X";}if(!$ae&&$Gi){foreach($Gi
as$z=>$X){$ch[]=idf_escape($z);if($rd)$rd[]=idf_escape($z);}}$H=$m->select($a,$ch,$Z,$rd,$zf,$_,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($y=="mssql"&&$E)$H->seek($_*$E);$wc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$y=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$_!=""&&$qd&&$ae&&$y=="sql")$kd=$g->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".'No rows.'."\n";else{$Oa=$b->backwardKeys($a,$Oh);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$qd&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Ve=array();$nd=array();reset($L);$zg=1;foreach($K[0]as$z=>$X){if(!isset($Gi[$z])){$X=$_GET["columns"][key($L)];$o=$p[$L?($X?$X["col"]:current($L)):$z];$D=($o?$b->fieldName($o,$zg):($X["fun"]?"*":$z));if($D!=""){$zg++;$Ve[$z]=$D;$e=idf_escape($z);$Ed=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($z);$bc="&desc%5B0%5D=1";echo"<th id='th[".h(bracket_escape($z))."]'>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Ed.($zf[0]==$e||$zf[0]==$z||(!$zf&&$ae&&$qd[0]==$e)?$bc:'')).'">';echo
apply_sql_function($X["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($Ed.$bc)."' title='".'descending'."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($z)."');");}echo"</span>";}$nd[$z]=$X["fun"];next($L);}}$ue=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$z=>$X)$ue[$z]=max($ue[$z],min(40,strlen(utf8_decode($X))));}}echo($Oa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($_%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$hd)as$Ue=>$J){$Di=unique_array($K[$Ue],$x);if(!$Di){$Di=array();foreach($K[$Ue]as$z=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$z))$Di[$z]=$X;}}$Ei="";foreach($Di
as$z=>$X){if(($y=="sql"||$y=="pgsql")&&preg_match('~char|text|enum|set~',$p[$z]["type"])&&strlen($X)>64){$z=(strpos($z,'(')?$z:idf_escape($z));$z="MD5(".($y!='sql'||preg_match("~^utf8~",$p[$z]["collation"])?$z:"CONVERT($z USING ".charset($g).")").")";$X=md5($X);}$Ei.="&".($X!==null?urlencode("where[".bracket_escape($z)."]")."=".urlencode($X):"null%5B%5D=".urlencode($z));}echo"<tr".odd().">".(!$qd&&$L?"":"<td>".checkbox("check[]",substr($Ei,1),in_array(substr($Ei,1),(array)$_POST["check"])).($ae||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ei)."' class='edit'>".'edit'."</a>"));foreach($J
as$z=>$X){if(isset($Ve[$z])){$o=$p[$z];$X=$m->value($X,$o);if($X!=""&&(!isset($wc[$z])||$wc[$z]!=""))$wc[$z]=(is_mail($X)?$Ve[$z]:"");$A="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$A=ME.'download='.urlencode($a).'&field='.urlencode($z).$Ei;if(!$A&&$X!==null){foreach((array)$hd[$z]as$r){if(count($hd[$z])==1||end($r["source"])==$z){$A="";foreach($r["source"]as$t=>$vh)$A.=where_link($t,$r["target"][$t],$K[$Ue][$vh]);$A=($r["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($r["db"]),ME):ME).'select='.urlencode($r["table"]).$A;if($r["ns"])$A=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($r["ns"]),$A);if(count($r["source"])==1)break;}}}if($z=="COUNT(*)"){$A=ME."select=".urlencode($a);$t=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Di))$A.=where_link($t++,$W["col"],$W["val"],$W["op"]);}foreach($Di
as$fe=>$W)$A.=where_link($t++,$fe,$W);}$X=select_value($X,$A,$o,$ci);$u=h("val[$Ei][".bracket_escape($z)."]");$Y=$_POST["val"][$Ei][bracket_escape($z)];$rc=!is_array($J[$z])&&is_utf8($X)&&$K[$Ue][$z]==$J[$z]&&!$nd[$z];$bi=preg_match('~text|lob~',$o["type"]);echo"<td id='$u'";if(($_GET["modify"]&&$rc)||$Y!==null){$vd=h($Y!==null?$Y:$J[$z]);echo">".($bi?"<textarea name='$u' cols='30' rows='".(substr_count($J[$z],"\n")+1)."'>$vd</textarea>":"<input name='$u' value='$vd' size='$ue[$z]'>");}else{$ye=strpos($X,"<i>…</i>");echo" data-text='".($ye?2:($bi?1:0))."'".($rc?"":" data-warning='".h('Use edit link to modify this value.')."'").">$X</td>";}}}if($Oa)echo"<td>";$b->backwardKeysPrint($Oa,$K[$Ue]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($K||$E){$Gc=true;if($_GET["page"]!="last"){if($_==""||(count($K)<$_&&($K||!$E)))$kd=($E?$E*$_:0)+count($K);elseif($y!="sql"||!$ae){$kd=($ae?false:found_rows($R,$Z));if($kd<max(1e4,2*($E+1)*$_))$kd=reset(slow_query(count_rows($a,$Z,$ae,$qd)));else$Gc=false;}}$Mf=($_!=""&&($kd===false||$kd>$_||$E));if($Mf){echo(($kd===false?count($K)+1:$kd-$E*$_)>$_?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$_).", '".'Loading'."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$E){if($Mf){$Fe=($kd===false?$E+(count($K)>=$_?2:1):floor(($kd-1)/$_));echo"<fieldset>";if($y!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" …":"");for($t=max(1,$E-4);$t<min($Fe,$E+5);$t++)echo
pagination($t,$E);if($Fe>0){echo($E+5<$Fe?" …":""),($Gc&&$kd!==false?pagination($Fe,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Fe'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$E).($E>1?" …":""),($E?pagination($E,$E):""),($Fe>$E?pagination($E+1,$E).($Fe>$E+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$gc=($Gc?"":"~ ").$kd;echo
checkbox("all",1,0,($kd!==false?($Gc?"":"~ ").lang(array('%d row','%d rows'),$kd):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$gc' : checked); selectCount('selected2', this.checked || !checked ? '$gc' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$id=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($id['sql']);break;}}if($id){print_fieldset("export",'Export'." <span id='selected2'></span>");$Jf=$b->dumpOutput();echo($Jf?html_select("output",$Jf,$ya["output"])." ":""),html_select("format",$id,$ya["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($wc,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ya["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$ni'>\n","</form>\n",(!$qd&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$O=isset($_GET["status"]);page_header($O?'Status':'Variables');$Ui=($O?show_status():show_variables());if(!$Ui)echo"<p class='message'>".'No rows.'."\n";else{echo"<table cellspacing='0'>\n";foreach($Ui
as$z=>$X){echo"<tr>","<th><code class='jush-".$y.($O?"status":"set")."'>".h($z)."</code>","<td>".h($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Lh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$D=>$R){json_row("Comment-$D",h($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$z)json_row("$z-$D",h($R[$z]));foreach($Lh+array("Auto_increment"=>0,"Rows"=>0)as$z=>$X){if($R[$z]!=""){$X=format_number($R[$z]);json_row("$z-$D",($z=="Rows"&&$X&&$R["Engine"]==($yh=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Lh[$z]))$Lh[$z]+=($R["Engine"]!="InnoDB"||$z!="Data_free"?$R[$z]:0);}elseif(array_key_exists($z,$R))json_row("$z-$D");}}}foreach($Lh
as$z=>$X)json_row("sum-$z",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$Uh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Uh&&!$n&&!$_POST["search"]){$H=true;$Ke="";if($y=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$Ke='Tables have been truncated.';}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ke='Tables have been moved.';}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ke='Tables have been copied.';}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$Ke='Tables have been dropped.';}elseif($y!="sql"){$H=($y=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Ke='Tables have been optimized.';}elseif(!$_POST["tables"])$Ke='No tables.';elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$Ke.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Ke,$H);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".'Tables and views'."</h3>\n";$Th=tables_list();if(!$Th)echo"<p class='message'>".'No tables.'."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".'Search data in tables'." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".'Search'."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.'Table','<td>'.'Engine'.doc_link(array('sql'=>'storage-engines.html')),'<td>'.'Collation'.doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.'Data Length'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT','oracle'=>'REFRN20286')),'<td>'.'Index Length'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT')),'<td>'.'Data Free'.doc_link(array('sql'=>'show-table-status.html')),'<td>'.'Auto Increment'.doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.'Rows'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'catalog-pg-class.html#CATALOG-PG-CLASS','oracle'=>'REFRN20286')),(support("comment")?'<td>'.'Comment'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-info.html#FUNCTIONS-INFO-COMMENT-TABLE')):''),"</thead>\n";$S=0;foreach($Th
as$D=>$T){$Xi=($T!==null&&!preg_match('~table|sequence~i',$T));$u=h("Table-".$D);echo'<tr'.odd().'><td>'.checkbox(($Xi?"views[]":"tables[]"),$D,in_array($D,$Uh,true),"","","",$u),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($D)."' title='".'Show structure'."' id='$u'>".h($D).'</a>':h($D));if($Xi){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($D).'" title="'.'Alter view'.'">'.(preg_match('~materialized~i',$T)?'Materialized view':'View').'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($D).'" title="'.'Select data'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Alter table'),"Index_length"=>array("indexes",'Alter indexes'),"Data_free"=>array("edit",'New item'),"Auto_increment"=>array("auto_increment=1&create",'Alter table'),"Rows"=>array("select",'Select data'),)as$z=>$A){$u=" id='$z-".h($D)."'";echo($A?"<td align='right'>".(support("table")||$z=="Rows"||(support("indexes")&&$z!="Data_length")?"<a href='".h(ME."$A[0]=").urlencode($D)."'$u title='$A[1]'>?</a>":"<span$u>?</span>"):"<td id='$z-".h($D)."'>");}$S++;}echo(support("comment")?"<td id='Comment-".h($D)."'>":"");}echo"<tr><td><th>".sprintf('%d in total',count($Th)),"<td>".h($y=="sql"?$g->result("SELECT @@default_storage_engine"):""),"<td>".h(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$z)echo"<td align='right' id='sum-$z'>";echo"</table>\n","</div>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Ri="<input type='submit' value='".'Vacuum'."'> ".on_help("'VACUUM'");$vf="<input type='submit' name='optimize' value='".'Optimize'."'> ".on_help($y=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>".($y=="sqlite"?$Ri:($y=="pgsql"?$Ri.$vf:($y=="sql"?"<input type='submit' value='".'Analyze'."'> ".on_help("'ANALYZE TABLE'").$vf."<input type='submit' name='check' value='".'Check'."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".'Repair'."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".'Truncate'."'> ".on_help($y=="sqlite"?"'DELETE'":"'TRUNCATE".($y=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".'Drop'."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$y!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".'Move'."'>",(support("copy")?" <input type='submit' name='copy' value='".'Copy'."'> ".checkbox("overwrite",1,$_POST["overwrite"],'overwrite'):""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")." }"),"<input type='hidden' name='token' value='$ni'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.'Create table'."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.'Create view'."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".'Routines'."</h3>\n";$Vg=routines();if($Vg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td></thead>\n";odd('');foreach($Vg
as$J){$D=($J["SPECIFIC_NAME"]==$J["ROUTINE_NAME"]?"":"&name=".urlencode($J["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["SPECIFIC_NAME"]).$D).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["SPECIFIC_NAME"]).$D).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'Create procedure'.'</a>':'').'<a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".'Sequences'."</h3>\n";$jh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($jh){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($jh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".'Create sequence'."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".'User types'."</h3>\n";$Pi=types();if($Pi){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($Pi
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".'Create type'."</a>\n";}if(support("event")){echo"<h3 id='events'>".'Events'."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?'At given time'."<td>".$J["Execute at"]:'Every'." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.'Alter'.'</a>';}echo"</table>\n";$Ec=$g->result("SELECT @@event_scheduler");if($Ec&&$Ec!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($Ec)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($Th)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();
