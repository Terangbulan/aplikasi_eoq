// JavaScript Document
var url;
		function newData(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data pelanggan');
			$('#fm').form('clear');
			$('#id_pelanggan').removeAttr('readonly','readonly');
			url = 'modules/pelanggan/save_pelanggan.php';
		}

		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Data pelanggan');
				$('#fm').form('load',row);
				$('#id_pelanggan').attr('readonly','readonly');
				url = 'modules/pelanggan/update_pelanggan.php';
			}
		}

		function saveData(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the pelanggan data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}

		function removeData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Anda yakin akan menghapus data ini?',function(r){
					if (r){
						$.post('modules/pelanggan/remove_pelanggan.php',{id_pelanggan:row.id_pelanggan},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the pelanggan data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		} 
		
		function doSearch(value){  
			$('#dg').datagrid('load',{    
		        cari: value
		    });  
		}  