package Stamp;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Timestamp;
import java.text.SimpleDateFormat;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/first")
public class firstServelet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    public firstServelet() {
        super();
    }

	protected void service(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException, NullPointerException {
		 
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();  
		 SimpleDateFormat sdf = new SimpleDateFormat("yyyy.MM.dd.HH.mm.ss");
		 Timestamp timestamp = new Timestamp(System.currentTimeMillis());
		 String date = ""+sdf.format(timestamp);
		       
		    Cookie ck[]=request.getCookies();
		    if(ck==null) {
			    ck[0]=new Cookie("present",date);//creating cookie object 
			    response.addCookie(ck[0]);//adding cookie in the response
			    ck[1]=new Cookie("past",date);//creating cookie object
			    response.addCookie(ck[1]);//adding cookie in the response
		    }
		    else {
		    	String lastDate = ck[0].getValue();
		    	ck[0].setValue(date);
		    	response.addCookie(ck[0]);
		    	ck[1].setValue(lastDate);
		    	response.addCookie(ck[1]);
		    }
		    out.print("present "+ck[0].getValue());
		    out.print("<br/>");
		    out.print("past    "+ck[1].getValue());
		    out.close();
	}
}
