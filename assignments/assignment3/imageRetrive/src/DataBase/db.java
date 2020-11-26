package DataBase;
import java.io.*;
import java.sql.*;
import java.util.Base64;

public class db implements java.io.Serializable  {
	private String Name;
	private int empid;
	private String birthdate;
	private String pic;
	public String getName() {
		return Name;
	}
	public void setEmpid(int empid) {
		this.empid = empid;
		System.out.println(empid);
		String url="jdbc:mysql://localhost:3306/imagedate";
		String username="hemanth";
		String password="hemanth@22";
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection con =DriverManager.getConnection(url,username,password);
			DatabaseMetaData metaData = con.getMetaData();
			System.out.println(metaData.getDatabaseProductName());
			Statement state = con.createStatement();
			String str = "SELECT name, Bdate, id, picture FROM image WHERE image.id ="+empid+";";
			ResultSet rst = state.executeQuery(str);
			if(rst.next())
			{
				Name=rst.getString("name");
				birthdate=""+rst.getDate("Bdate");
				Blob pc=rst.getBlob("picture");
				InputStream inputStream = pc.getBinaryStream();
				 ByteArrayOutputStream outputStream = new
				ByteArrayOutputStream();
				 byte[] buffer = new byte[4096];
				 int bytesRead = -1;
				 while ((bytesRead = inputStream.read(buffer)) != -1) {
				 outputStream.write(buffer, 0, bytesRead);
				 }
				 byte[] imageBytes = outputStream.toByteArray();
				 pic = Base64.getEncoder().encodeToString(imageBytes);
				 inputStream.close();
				 outputStream.close();
			}
			else {
				Name="No Data";
				birthdate="No Data";
				pic="No Data";
			}
		} catch (Exception e) {
			// TODO Auto-generated catch block
		}
	}
	public String getBirthdate() {
		return birthdate;
	}
	public String getPic() {
		return pic;
	}	
}
