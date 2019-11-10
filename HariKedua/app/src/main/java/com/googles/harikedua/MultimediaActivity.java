package com.googles.harikedua;

import androidx.appcompat.app.AppCompatActivity;

import android.net.Uri;
import android.os.Bundle;
import android.view.WindowManager;
import android.widget.MediaController;
import android.widget.VideoView;

public class MultimediaActivity extends AppCompatActivity {
    //variabel videoview
    VideoView videoObjek;
    MediaController mediaControllerVideo;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_multimedia);
        //inisialisasi
        videoObjek = (VideoView) findViewById(R.id.video_view);
            //fullscreen
            getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
            getSupportActionBar().hide();


        //set video dimana di simpan
        videoObjek.setVideoURI(Uri.parse("android.resource://"+getPackageName()+"/"+R.raw.video));

        mediaControllerVideo = new MediaController(this);
        mediaControllerVideo.setAnchorView(videoObjek);
        videoObjek.setMediaController(mediaControllerVideo);
        videoObjek.start();

    }
}
