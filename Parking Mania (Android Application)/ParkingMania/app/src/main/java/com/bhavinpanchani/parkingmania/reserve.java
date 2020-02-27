package com.bhavinpanchani.parkingmania;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.constraintlayout.widget.ConstraintLayout;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

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

public class reserve extends AppCompatActivity {

    EditText make,model,ownername,telephone,license,plan,cardname,cardnum,expdate,seccode;
    String username,stmake,stmodel,stownername,sttelephone,stlicense,stplan,stcardname,stcardnum,stexpdate,stseccode,result;
    Button reserveBtn;
    AlertDialog alertDialog;
    ConstraintLayout constraintLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reserve);

        View view = reserve.this.getCurrentFocus();
        if(view != null){
            InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
            imm.hideSoftInputFromWindow(view.getWindowToken(), 0);
        }

        constraintLayout = findViewById(R.id.ConstraintLayout);
        make = findViewById(R.id.make_text);
        model = findViewById(R.id.model_text);
        ownername = findViewById(R.id.ownername_txt);
        telephone = findViewById(R.id.contact_num_txt);
        license = findViewById(R.id.license_text);
        plan = findViewById(R.id.plan_text);
        cardname = findViewById(R.id.card_name_text);
        cardnum = findViewById(R.id.card_num_text);
        expdate = findViewById(R.id.expdate_text);
        seccode = findViewById(R.id.seccode_text);

        reserveBtn = findViewById(R.id.reserveBtn);

        constraintLayout.setVisibility(View.VISIBLE);

        Intent intent = getIntent();
        username = intent.getStringExtra("username");

        new checkIfUserHasReservation().execute(username);
    }

    public void onReserve(View view){

        String type = "reserve";

        //here I got the username from the login activity. Now I can use this username to put into the database
//        System.out.println(stusername);


        stmake = make.getText().toString();
        stmodel = model.getText().toString();
        stownername = ownername.getText().toString();
        sttelephone = telephone.getText().toString();
        stlicense = license.getText().toString();
        stplan = plan.getText().toString();
        stcardname = cardname.getText().toString();
        stcardnum = cardnum.getText().toString();
        stexpdate = expdate.getText().toString();
        stseccode = seccode.getText().toString();

        backend backend = new backend(this);
        backend.execute(type, stmake, stmodel, stownername, sttelephone, stlicense, stplan, stcardname, stcardnum, stexpdate, stseccode, username);

    }

    class checkIfUserHasReservation extends AsyncTask<String,String,String> {

        @Override
        protected String doInBackground(String... strings) {

            String view_url = "http://eve.kean.edu/~panchanb/ParkingMania/mobile_reserve.php";

            
            try {
                username = strings[0];
                URL url = new URL(view_url);
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

                result = "";
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

            return null;
        }

        @Override
        protected void onPostExecute(String result) {
//            super.onPostExecute(s);
            alertDialog = new AlertDialog.Builder(reserve.this).create();
            alertDialog.setTitle("Message:");


            if (result.equals("Has Reservation")){
                constraintLayout.setVisibility(View.INVISIBLE);
                alertDialog.setMessage("Seems like you already have a reservation. Please go to View/Cancel page");
                alertDialog.setButton(DialogInterface.BUTTON_POSITIVE, "ok", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        reserve.super.onBackPressed();
                    }
                });
                alertDialog.setCancelable(false);
                alertDialog.show();
            }
        }
    }
}
