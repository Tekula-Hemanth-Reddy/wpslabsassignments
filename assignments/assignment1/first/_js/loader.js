$(document).ready(function(){
    $('.sidenav').sidenav();
  });

  function submitDetails()
  {
      var stuName=Document.getElementbyId("stu_name");
      var stuEmail=Document.getElementbyId("email");
      var stuPhone=Document.getElementbyId("phone");
      var stuAddress=Document.getElementbyId("address");

      var branch=Document.getElementbyId("branch");
      var section=Document.getElementbyId("section");
      var rollNumber=Document.getElementbyId("rollNumber");

      var proName=Document.getElementbyId("proctorName");
      var proEmail=Document.getElementbyId("proctorEmail");
      var proPhone=Document.getElementbyId("proctorPhone");

      var first=Document.getElementbyId("first");
      var second=Document.getElementbyId("second");
      var third=Document.getElementbyId("third");
      var fourth=Document.getElementbyId("fourth");

      var setName = document.createElement("p");
      setName.setAttribute("id","0");
      setName.innerHTML(stuName+"<br>");
      var setEmail = document.createElement("p");
      setEmail.setAttribute("id","0");
      setEmail.innerHTML(stuEmail+"<br>");
      var setPhone = document.createElement("p");
      setPhone.setAttribute("id","0");
      setPhone.innerHTML(stuPhone+"<br>");
      var setAddress = document.createElement("p");
      setAddress.setAttribute("id","0");
      setAddress.innerHTML(stuAddress+"<br><hr>");
      document.write(stuName);
  }