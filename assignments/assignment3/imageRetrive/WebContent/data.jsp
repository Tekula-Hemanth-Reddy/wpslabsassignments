<%@ page import="DataBase.db" language="java" contentType="text/html; charset=ISO-8859-1"
pageEncoding="ISO-8859-1"%>
<%@ page import="java.util.*" %>
<jsp:useBean id = "d" class="DataBase.db"></jsp:useBean>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        h1,h2,h3,h4,h5,h6 {
         color:crimson;
         font-weight: bold;
        }
    </style>
</head>
<body style="background-image: url('./background.jpg');background-size: cover;">
<%int eid=Integer.parseInt(request.getParameter("empId"));%>
${d.setEmpid(eid)}
    <div class="container">
        <div class="card-panel center" style="margin-top:30%;background-color: #00ffff;">
            <div class="row">
                <div class="input-field col l6 m6 s12">
                    <div class="row">
                        <div class="input-field col l6 m6 s6">
                            <h4>Name</h4>
                        </div>
                        <div class="input-field col l6 m6 s6">
                            <h4>${d.getName() }</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l6 m6 s6">
                            <h4>Date Of Birth</h4>
                        </div>
                        <div class="input-field col l6 m6 s6">
                            <h4>${d.getBirthdate()}</h4>
                        </div>
                    </div>
                    <a class="waves-effect waves-light btn" href="index.html" style="background-color: aqua; color: #000000;">Back</a>
                </div>
                <div class="input-field col l6 m6 s12">
                <img src="data:image/jpg;base64,${d.getPic() }" alt="No Data" width="80%" height="80%"/>
                </div>
            </div>
        </div>
    </div>   
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"
 integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
 crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>