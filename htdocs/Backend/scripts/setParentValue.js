function setParentValueMateria(valorId)
{
	//window.opener.document.getElementById('materia').value	=	valorId;
	// obtener curso id que esta hidden
	//var cursoId	=	document.getElementById('cursoId');
	//alert(valorId);
	window.opener.guardarObtenerMateria(valorId);
	self.close();
	
	//alert(chk);
	/*
	for (i = 0; i < chk.length; i++)
	{
		if(chk[i].checked)
		{
			//alert(chk[i].value);
			window.opener.document.getElementById('materia').value	=	chk[i].value;
			// call ajax in parent page
			// lamar a funcion en padre con GuardarObtenerMateria( idFilial, idMateria )
			var cursoId	=	document.getElementById('cursoId');
			window.opener.guardarObtenerDocente(cursoId.value, chk[i].value);
			self.close();
			//window.opener.location.reload();
		}
	}*/
}

function setParentValueDocente(valorId)
{
	//alert(valorId);
	window.opener.guardarObtenerDocente(valorId, 'add');
	self.close();
}

function setParentValueHorarioCurso(valorId)
{
	//alert(valorId);
	window.opener.guardarObtenerHorario(valorId, 'add');
	self.close();
}

function setParentValueHorarioComision(valorId)
{
	//alert(valorId);
	window.opener.guardarObtenerHorario(valorId, 'add');
	self.close();
}

function setParentValueSubsede(valorId)
{
	//alert(valorId);
	window.opener.guardarObtenerSubsede(valorId);
	self.close();
}

function setParentValueCurso(valorId)
{
	alert(valorId);
	//window.opener.guardarObtenerSubsede(valorId);
	//self.close();
}

function setParentValueComision(valorId)
{
	alert(valorId);
	//window.opener.guardarObtenerSubsede(valorId);
	//self.close();
}

function setParentValueInsumo(insumoId)
{
	//alert(insumoId);
	window.opener.guardarObtenerInsumos(insumoId, 'add');
	self.close();
}