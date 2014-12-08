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

	function RegisterImage(imgname, imgon, imgoff){
	if (scriptson) {
	eval (imgname + 'on = new Image()');
	eval (imgname + 'on.src = \'' + imgon + '\'');
	eval (imgname + 'off = new Image()');
	eval (imgname + 'off.src = \'' + imgoff + '\'');
	}}

	function ImageOver(imgname){
	if (scriptson)
	eval ('document.'+imgname+'.src='+imgname+'on.src');}

	function ImageOut(imgname){
	if (scriptson)
	eval ('document.'+imgname+'.src='+imgname+'off.src');}

	RegisterImage ('m_lin','images/page/m_lin_m.jpg','images/page/m_lin.jpg');
	RegisterImage ('m_pokec','images/page/m_pokec_m.jpg','images/page/m_pokec.jpg');
	RegisterImage ('m_vid','images/page/m_vid_m.jpg','images/page/m_vid.jpg');
	RegisterImage ('m_we','images/page/m_we_m.jpg','images/page/m_we.jpg');
	RegisterImage ('m_ter','images/page/m_ter_m.jpg','images/page/m_ter.jpg');
	RegisterImage ('m_vzk','images/page/m_vzk_m.jpg','images/page/m_vzk.jpg');

	
