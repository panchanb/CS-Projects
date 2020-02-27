package com.bhavinpanchani.parkingmania;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.View;
import android.widget.ProgressBar;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

import androidx.appcompat.app.AlertDialog;

public class backend extends AsyncTask<String,Void, String > {

    Context context;
    AlertDialog alertDialog;
    String username;
    backend(Context ctx){
        context = ctx;
    }

    @Override
    protected String doInBackground(String... voids) {
        String type = voids[0];
        String login_url= "http://eve.kean.edu/~panchanb/ParkingMania/mobile_login.php";
        String signup_url= "http://eve.kean.edu/~panchanb/ParkingMania/mobile_register.php";
        String reserve_url= "http://eve.kean.edu/~panchanb/ParkingMania/mobile_reserve.php";
        String cancel_url = "http://eve.kean.edu/~panchanb/ParkingMania/mobile_cancel_reservation.php";
        String contactus_url = "http://eve.kean.edu/~panchanb/ParkingMania/mobile_contactus.php";


        if (type.equals("login")){
            try {
                username = voids[1];
                String password = voids[2];
                URL url = new URL(login_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String postdata = URLEncoder.encode("username","UTF-8")+"="+URLEncoder.encode(username,"UTF-8")+"&"
                        +URLEncoder.encode("password","UTF-8")+"="+URLEncoder.encode(password,"UTF-8");
                bufferedWriter.write(postdata);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));

                String result = "";
                String line = "";

                while ((line = bufferedReader.readLine()) != null){
                    result += line;
                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        else if (type.equals("signup")){
            try {
                String username = voids[1];
                String email = voids[2];
                String password = voids[3];
                String confirmPassword = voids[4];
                URL url = new URL(signup_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String postdata = URLEncoder.encode("username","UTF-8")+"="+URLEncoder.encode(username,"UTF-8")+"&"
                        +URLEncoder.encode("email","UTF-8")+"="+URLEncoder.encode(email,"UTF-8")+"&"
                        +URLEncoder.encode("password","UTF-8")+"="+URLEncoder.encode(password,"UTF-8")+"&"
                        +URLEncoder.encode("confirmPassword","UTF-8")+"="+URLEncoder.encode(confirmPassword,"UTF-8");
                bufferedWriter.write(postdata);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));

                String result = "";
                String line = "";

                while ((line = bufferedReader.readLine()) != null){
                    result += line;
                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }

        else if (type.equals("reserve")){
            try {
                String make = voids[1];
                String model = voids[2];
                String ownername = voids[3];
                String telephone = voids[4];
                String license = voids[5];
                String plan = voids[6];
                String cardname = voids[7];
                String cardnum = voids[8];
                String expdate = voids[9];
                String seccode = voids[10];
                username = voids[11];

                URL url = new URL(reserve_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String postdata = URLEncoder.encode("make","UTF-8")+"="+URLEncoder.encode(make,"UTF-8")+"&"
                        +URLEncoder.encode("model","UTF-8")+"="+URLEncoder.encode(model,"UTF-8")+"&"
                        +URLEncoder.encode("username","UTF-8")+"="+URLEncoder.encode(username,"UTF-8")+"&"
                        +URLEncoder.encode("ownername","UTF-8")+"="+URLEncoder.encode(ownername,"UTF-8")+"&"
                        +URLEncoder.encode("telephone","UTF-8")+"="+URLEncoder.encode(telephone,"UTF-8")+"&"
                        +URLEncoder.encode("license","UTF-8")+"="+URLEncoder.encode(license,"UTF-8")+"&"
                        +URLEncoder.encode("plan","UTF-8")+"="+URLEncoder.encode(plan,"UTF-8")+"&"
                        +URLEncoder.encode("cardname","UTF-8")+"="+URLEncoder.encode(cardname,"UTF-8")+"&"
                        +URLEncoder.encode("cardnum","UTF-8")+"="+URLEncoder.encode(cardnum,"UTF-8")+"&"
                        +URLEncoder.encode("expdate","UTF-8")+"="+URLEncoder.encode(expdate,"UTF-8")+"&"
                        +URLEncoder.encode("seccode","UTF-8")+"="+URLEncoder.encode(seccode,"UTF-8");
                bufferedWriter.write(postdata);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));

                String result = "";
                String line = "";

                while ((line = bufferedReader.readLine()) != null){
                    result += line;
                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }

        else if (type.equals("cancel")){
            try {
                username = voids[1];
                URL url = new URL(cancel_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String postdata = URLEncoder.encode("username","UTF-8")+"="+URLEncoder.encode(username,"UTF-8");
                bufferedWriter.write(postdata);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));

                String result = "";
                String line = "";

                while ((line = bufferedReader.readLine()) != null){
                    result += line;
                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }

        else if (type.equals("contactus")){
            try {
                String stFname = voids[1];
                String stLname = voids[2];
                String stTelephone = voids[3];
                String stMsg = voids[4];
                username = voids[5];
                URL url = new URL(contactus_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String postdata = URLEncoder.encode("stFname","UTF-8")+"="+URLEncoder.encode(stFname,"UTF-8")+"&"
                        +URLEncoder.encode("stLname","UTF-8")+"="+URLEncoder.encode(stLname,"UTF-8")+"&"
                        +URLEncoder.encode("stTelephone","UTF-8")+"="+URLEncoder.encode(stTelephone,"UTF-8")+"&"
                        +URLEncoder.encode("stMsg","UTF-8")+"="+URLEncoder.encode(stMsg,"UTF-8");
                bufferedWriter.write(postdata);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));

                String result = "";
                String line = "";

                while ((line = bufferedReader.readLine()) != null){
                    result += line;
                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }

        return null;
    }

    @Override
    protected void onPreExecute() {
        alertDialog = new AlertDialog.Builder(context).create();
        alertDialog.setTitle("Message:");
    }

    @Override
    protected void onPostExecute(String result) {

        //result2 = result;

        if(result.equals("login success")){
            Intent intent = new Intent(context,home.class);
            intent.putExtra("username", username);
            context.startActivity(intent);
        }
        else if (result.equals("Insert success")){
            Intent intent = new Intent(context,login.class);
            context.startActivity(intent);
            Toast.makeText(context, "Welcome! Please login to continue!", Toast.LENGTH_LONG).show();
        }
        else if (result.equals("reserve success")){
            Intent intent = new Intent(context, home.class);
            intent.putExtra("username", username);
            context.startActivity(intent);
            Toast.makeText(context, "Vehicle information is added. Your reservation is confirmed!", Toast.LENGTH_LONG).show();
        }
        else if (result.equals("Has Reservation")) {
            alertDialog.setMessage("Seems like you already have a reservation. Please go to View/Cancel page");
            alertDialog.show();
        }
        else if (result.equals("Cancellation success")){
            Intent intent = new Intent(context,home.class);
            intent.putExtra("username", username);
            context.startActivity(intent);
            Toast.makeText(context, "Your reservation is cancelled!", Toast.LENGTH_LONG).show();
        }
        else if (result.equals("feedback sent")){
            Intent intent = new Intent(context,home.class);
            intent.putExtra("username", username);
            context.startActivity(intent);
            Toast.makeText(context, "Your response is saved! Thank You for your feedback!", Toast.LENGTH_LONG).show();
        }
        else{
            alertDialog.setMessage(result);
            alertDialog.show();
        }
    }

    @Override
    protected void onProgressUpdate(Void... values) {
//        super.onProgressUpdate(values);
    }
}
