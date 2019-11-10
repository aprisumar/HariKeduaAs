package com.googles.harikedua;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class WebviewActivity extends AppCompatActivity {

    //global variabel
    WebView webViewYoutube ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_webview);

        //inisialisasi (setiap variabel widget butuh banget inisialisasi)
        webViewYoutube = (WebView) findViewById(R.id.webview_youtube);
        //attribute
        webViewYoutube.loadUrl("https://www.youtube.com/");
        webViewYoutube.getSettings().setJavaScriptEnabled(true);
          webViewYoutube.setWebViewClient(new WebViewClient());

    }

    @Override
    public void onBackPressed() {
        if (webViewYoutube.canGoBack()){
            webViewYoutube.goBack();
        } else {
            super.onBackPressed();

        }
    }
}
