package com.example2.bhavinpanchani.movieson;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.media.MediaPlayer;
import android.net.Uri;
import android.os.Build;
import android.os.Handler;
import android.support.annotation.RequiresApi;
import android.support.constraint.ConstraintLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.SeekBar;
import android.widget.TextView;
import android.widget.VideoView;

public class VideoViewActivity extends AppCompatActivity implements SeekBar.OnSeekBarChangeListener{

    private VideoView vv;
    private Uri vu;
    private ImageView playbutton, pausebutton, backbtn;
    private ConstraintLayout constraintLayout;
    private ProgressBar videoprogress;
    private SeekBar videoseekbar;
    private TextView starttime, endtime;
    private Handler videohandler;
    private Runnable videorunnable;
    private Animation fadein, fadeout;

    @RequiresApi(api = Build.VERSION_CODES.JELLY_BEAN_MR1)
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_video_view);

        // Sets the Screen to landscape mode
        this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_LANDSCAPE);
        // Hides the Status bar and Navigation button
        fullScreen();

        playbutton = findViewById(R.id.play);
        pausebutton = findViewById(R.id.pause);
        backbtn = findViewById(R.id.backbutton);
        constraintLayout = findViewById(R.id.constraintlayout);
        videoprogress = findViewById(R.id.videoprogress);
        videoseekbar = findViewById(R.id.seekBar);
        starttime = findViewById(R.id.starttime);
        endtime = findViewById(R.id.endtime);

        Intent intent = getIntent();
        // gets the String from the previous Activity (HomeScreen)
        String url = intent.getStringExtra("url");

        // Reference to videoView in the layout.xml file
        vv = findViewById(R.id.videoView);
        // converts the String url into URI
        vu = Uri.parse(url);
        // set the URI into the VideoView
        vv.setVideoURI(vu);
        vv.requestFocus();

        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.JELLY_BEAN_MR1) {
            vv.setOnInfoListener(new MediaPlayer.OnInfoListener() {
                @Override
                public boolean onInfo(MediaPlayer mp, int what, int extra) {

                    switch (what){
                        case MediaPlayer.MEDIA_INFO_VIDEO_RENDERING_START:
                            videoprogress.setVisibility(View.GONE);
                            return true;

                        case MediaPlayer.MEDIA_INFO_BUFFERING_START:
                            videoprogress.setVisibility(View.VISIBLE);
                            return true;

                        case MediaPlayer.MEDIA_INFO_BUFFERING_END:
                            videoprogress.setVisibility(View.INVISIBLE);
                            return true;
                    }
                    return false;
                }
            });
        }

        vv.start();

        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {

                if(vv.isPlaying() == true){

                    playbutton.setVisibility(View.INVISIBLE);
                    pausebutton.setVisibility(View.INVISIBLE);
                    starttime.setVisibility(View.INVISIBLE);
                    endtime.setVisibility(View.INVISIBLE);
                    videoseekbar.setVisibility(View.INVISIBLE);
                    backbtn.setVisibility(View.INVISIBLE);

                }
            }
        },5000);

        vv.setOnPreparedListener(new MediaPlayer.OnPreparedListener() {
            @Override
            public void onPrepared(MediaPlayer mp) {

                videoseekbar.setMax(vv.getDuration());
                videoseekbar.postDelayed(videorunnable, 1000);
            }
        });

        playbutton.setVisibility(View.INVISIBLE);

        constraintLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                new Handler().postDelayed(new Runnable() {
                    @Override
                    public void run() {

                        if(vv.isPlaying() == true){

                            playbutton.setVisibility(View.INVISIBLE);
                            pausebutton.setVisibility(View.INVISIBLE);
                            starttime.setVisibility(View.INVISIBLE);
                            endtime.setVisibility(View.INVISIBLE);
                            videoseekbar.setVisibility(View.INVISIBLE);
                            backbtn.setVisibility(View.INVISIBLE);

                        }
                    }
                },5000);

                if(pausebutton.getVisibility() == View.VISIBLE && playbutton.getVisibility() == View.INVISIBLE){

                    pausebutton.setVisibility(View.INVISIBLE);
                    backbtn.setVisibility(View.INVISIBLE);
                    videoseekbar.setVisibility(View.INVISIBLE);
                    starttime.setVisibility(View.INVISIBLE);
                    endtime.setVisibility(View.INVISIBLE);
                }

                else if(pausebutton.getVisibility() == View.INVISIBLE && playbutton.getVisibility() == View.INVISIBLE) {
                    pausebutton.setVisibility(View.VISIBLE);
                    backbtn.setVisibility(View.VISIBLE);
                    videoseekbar.setVisibility(View.VISIBLE);
                    starttime.setVisibility(View.VISIBLE);
                    endtime.setVisibility(View.VISIBLE);
                }
            }
        });

        pausebutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pausebutton.setVisibility(View.INVISIBLE);
                playbutton.setVisibility(View.VISIBLE);
                vv.pause();
            }
        });

        playbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                playbutton.setVisibility(View.INVISIBLE);
                pausebutton.setVisibility(View.VISIBLE);
                vv.start();
            }
        });

        backbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                VideoViewActivity.super.onBackPressed();
            }
        });

        setHandler();
        initializeSeekBar();

    }

    private void fullScreen(){
        this.getWindow().getDecorView()
                .setSystemUiVisibility(
                        View.SYSTEM_UI_FLAG_FULLSCREEN |
                                View.SYSTEM_UI_FLAG_HIDE_NAVIGATION |
                                View.SYSTEM_UI_FLAG_IMMERSIVE_STICKY |
                                View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN |
                                View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION |
                                View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                );
    }

    private void initializeSeekBar() {
        videoseekbar.setProgress(0);
        videoseekbar.setOnSeekBarChangeListener(this);
    }

    private void setHandler(){

        videohandler = new Handler();
        videorunnable = new Runnable() {
            @Override
            public void run() {

                if (vv.getDuration() > 0){
                    int currentVideoDuration = vv.getCurrentPosition();
                    videoseekbar.setProgress(currentVideoDuration);
                    starttime.setText("" + convertIntoTime(currentVideoDuration));
                    endtime.setText("-" + convertIntoTime(vv.getDuration() - currentVideoDuration));
                }
                videohandler.postDelayed(this,0);
            }
        };
        videohandler.postDelayed(videorunnable,500);
    }

    private String convertIntoTime(int ms){
        String time;
        int x, seconds, minutes, hours;
        x = (int) (ms / 1000);
        seconds = x % 60;
        x /= 60;
        minutes = x % 60;
        x /= 60;
        hours = x % 24;
        if (hours != 0)
            time = String.format("%02d", hours) + ":" + String.format("%02d", minutes) + ":" + String.format("%02d", seconds);
        else time = String.format("%02d", minutes) + ":" + String.format("%02d", seconds);
        return time;

    }

    @Override
    public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
        switch (seekBar.getId()){
            case R.id.seekBar:
                if (fromUser) {
                    vv.seekTo(progress);
                    int currentVideoDuration = vv.getCurrentPosition();
                    starttime.setText("" + convertIntoTime(currentVideoDuration));
                    endtime.setText("-" + convertIntoTime(vv.getDuration() - currentVideoDuration));
                }
                break;
        }
    }

    @Override
    public void onStartTrackingTouch(SeekBar seekBar) {

    }

    @Override
    public void onStopTrackingTouch(SeekBar seekBar) {

    }
}
