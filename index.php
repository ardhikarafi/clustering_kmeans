<html>
<head>
	<style>
		body{
			font-size:14px;
			font-family:tahoma;
			font-weight:bold;
		}
	
		button{
			background: gray;
			color : #FFF;
			font-weight:bold;
			padding:2 5 2 5px;
			margin:2px;
		}
		
		table{
			border : 1px solid #000;
			text-align : center;
			font-family:tahoma;
			font-size:12px;
		}
		table tr th{
			border : 1px solid #000;
			background : gray;
			color : #FFF;
			padding:3px;
		}
		table tr td{
			border : 1px solid #000;
		}
	</style>
	
	<SCRIPT language="javascript">
		function addRow(tableID) {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var cell1 = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			cell1.appendChild(element1);
		}

		function Add(id){
			var table=document.getElementById(id);
			var clone=table.getElementsByTagName('Tbody')[1].cloneNode(true);
				table.appendChild(clone);

			var rowCount = table.rows.length;
			var row = table.rows[rowCount];
			table.rows[rowCount-1].cells[0].innerHTML = rowCount-1;
		}


		function deleteRow(tableID) {
			try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
				if (rowCount>2){
					table.deleteRow(rowCount-1);
					rowCount--;
				}
			}catch(e) {
				alert(e);
			}
		}
	</SCRIPT>
</head>
<body>

<div style="width:950;text-align:center;font-weight:bold;padding-bottom:30px;">CLUSTERING DATA</div>

<form action="hasil.php" target="_BLANK" method="POST">
<div style="float:left;width:500px;">
	<div style="width:500px;text-align:center;font-weight:bold;padding:10px;">DATA OBJEK</div>
	<button onclick="deleteRow('data');return false;"/>Hapus Data</button>
	<button onclick="Add('data');return false;"/>Tambah Data</button><br>

	<TABLE width="450px" border="1" cellpadding="0" cellspacing="0" bordercolor="#000066" id="data">
		<tbody>
			<TR>
				<Th>Objek</Th>
				<Th>Data</Th>
			</TR>
		</tbody>
		<tbody>
			<TR>
				<TD> 1 </TD>
				<TD><INPUT type="text" size="50" name="objek[]"/></TD>
			</TR>
		</tbody>
	</TABLE>
</div>

<div style="float:left;width:500px;">
	<div style="width:500px;text-align:center;font-weight:bold;padding:10px;">DATA CLUSTER</div>
	
	<button onclick="deleteRow('cluster');return false;"/>Hapus Cluster</button>
	<button onclick="Add('cluster');return false;"/>Tambah Cluster</button><br>

	<TABLE width="450px" border="1" cellpadding="0" cellspacing="0" bordercolor="#000066" id="cluster">
		<tbody>
			<TR>
				<Th>Cluster</Th>
				<Th>Centroid Awal</Th>
			</TR>
		</tbody>
		<tbody>
			<TR>
				<TD> 1 </TD>
				<TD><INPUT type="text" size="50" name="cluster[]"/></TD>
			</TR>
		</tbody>
	</TABLE>
</div>
<div style="float:left;width:950px;margin-top:50px;text-align:center;"><button type="submit">Proses</button></div>
</form>	
</body>
</html>