/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var scriptson = false;
	if (((navigator.appName == 'Netscape') 
	&& (parseInt(navigator.appVersion) >= 3 )) ||
	((navigator.appName == 'Microsoft Internet Explorer')
	&& (parseInt(navigator.appVersion) >= 4)))
	scriptson=true;

	function ImageOver(imgname){
	if (scriptson)
	eval ('document.'+imgname+'.src='+imgname+'on.src');}

	function ImageOut(imgname){
	if (scriptson)
	eval ('document.'+imgname+'.src='+imgname+'off.src');}