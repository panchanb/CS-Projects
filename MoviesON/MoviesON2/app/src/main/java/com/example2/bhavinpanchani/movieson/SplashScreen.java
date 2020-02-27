package com.example2.bhavinpanchani.movieson;

import android.app.ActivityOptions;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.graphics.drawable.AnimationDrawable;
import android.os.Handler;
import android.support.constraint.ConstraintLayout;
import android.support.v4.app.ActivityOptionsCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Pair;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.TextView;

import com.google.firebase.auth.FirebaseAuth;

public class SplashScreen extends AppCompatActivity {

    private TextView logo;
    private FirebaseAuth firebaseAuth;
    private ConstraintLayout layout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        getWindow().requestFeature(Window.FEATURE_CONTENT_TRANSITIONS);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS,WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS);
        this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_screen);

        logo = findViewById(R.id.MoviesONLogo);
        layout = findViewById(R.id.layout);

        AnimationDrawable animDraw = (AnimationDrawable) layout.getBackground();
        animDraw.setEnterFadeDuration(750);
        animDraw.setExitFadeDuration(1500);
        animDraw.start();

        Animation fadein = AnimationUtils.loadAnimation(this,R.anim.fadein);
        logo.startAnimation(fadein);

        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {

                firebaseAuth = FirebaseAuth.getInstance();

                if(firebaseAuth.getCurrentUser() != null){
                    Intent intent = new Intent(SplashScreen.this,HomeScreen.class);
                    startActivity(intent);
                    overridePendingTransition(R.anim.fadein,R.anim.fadeout);
                    finish();
                }
                else{
                    Intent intent2 = new Intent(SplashScreen.this,LoginActivity.class);
                    ActivityOptions options = ActivityOptions.makeSceneTransitionAnimation(SplashScreen.this,logo,"MoviesONTransition");
                    startActivity(intent2,options.toBundle());
                }
            }
        },3000);
    }
}
