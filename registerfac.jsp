<html>
 <body>
 <%@page import="java.sql.*,java.util.*" %>
<%! String si,sp,sr,sb;
int sm;
String url,dbid,dbpw;
int i;
%>
<%
user = request.getParameter("Username");
email = request.getParameter("email");
password = request.getParameter("password");
url="jdbc:oracle:thin:@localhost:1521:xe";
dbid="system";
dbpw="system";
try
{
Class.forName("oracle.jdbc.driver.OracleDriver");// Load the drivers
Connection c = DriverManager.getConnection(url,dbid,dbpw);// Register
the driver and have the connection
PreparedStatement s = c.prepareStatement(insert into faclogin
values(user,email,password));// create sql query
 s.setString(1,user);
s.setString(2,email);
s.setString(3,password);
i = s.executeUpdate();
if(i>0)
 out. println("Registered Successfully");
 else
 out. println("unable to Register");
c.close();
}
catch(Exception e)
{
out. println("Exception raised"+e);
}
 %>
</body>
</html>
 