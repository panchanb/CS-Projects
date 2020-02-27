package com.bhavinpanchani.parkingmania;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class register extends AppCompatActivity {

    EditText username, email, password, confirmpassword;
    String str_username, str_email, str_pass, str_confirm_pass;
    Button signupbtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        username = findViewById(R.id.R_username_txt);
        email = findViewById(R.id.R_email_txt);
        password = findViewById(R.id.R_pass_text);
        confirmpassword = findViewById(R.id.R_confirm_pass_txt);
        signupbtn = findViewById(R.id.signupbtn);

    }

    public void onSignup(View view){

        String type = "signup";
        str_username = username.getText().toString();
        str_email = email.getText().toString();
        str_pass = password.getText().toString();
        str_confirm_pass = confirmpassword.getText().toString();

        backend backend = new backend(this);
        backend.execute(type, str_username, str_email, str_pass, str_confirm_pass);

    }
}
