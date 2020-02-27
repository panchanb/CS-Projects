package com.bhavinpanchani.parkingmania;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.text.SpannableString;
import android.text.Spanned;
import android.text.style.UnderlineSpan;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class login extends AppCompatActivity {

    EditText username_txt, password_txt;
    Button login_btn, logToSignupbtn;
    TextView clickhere;
    String string = "click here";
    SpannableString ss;
    UnderlineSpan underlineSpan;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        username_txt = findViewById(R.id.username_text);
        password_txt = findViewById(R.id.password_text);
        login_btn = findViewById(R.id.login_btn);
        logToSignupbtn = findViewById(R.id.Log_SignupBtn);
        clickhere = findViewById(R.id.clickhere);

        ss = new SpannableString(string);
        underlineSpan = new UnderlineSpan();
        ss.setSpan(underlineSpan,0,10, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE);
        clickhere.setText(ss);

        clickhere.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent openwebsite = new Intent(Intent.ACTION_VIEW, Uri.parse("http://eve.kean.edu/~panchanb/ParkingMania/login.php"));
                startActivity(openwebsite);
            }
        });

    }

    public void onLogin(View view){
        String type = "login";
        String username = username_txt.getText().toString();
        String password = password_txt.getText().toString();
        if(username.equals("admin") && password.equals("admin")){
            Intent i = new Intent(login.this,licensePlateChecker.class);
            startActivity(i);
        }
        else{
            backend backend = new backend(this);
            backend.execute(type, username, password);
        }


    }

    public void onLogtosignup(View view){
        Intent i = new Intent(login.this,register.class);
        startActivity(i);

    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        moveTaskToBack(true);
    }
}
