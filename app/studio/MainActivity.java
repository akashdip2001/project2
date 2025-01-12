package com.akashdipmahapatra.freecad;

import android.content.pm.ActivityInfo;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.view.WindowManager;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.FrameLayout;
import android.widget.Toast;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    private WebView webView;
    private FrameLayout videoContainer;
    private View customView;
    private WebChromeClient.CustomViewCallback customViewCallback;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //sc
        getWindow().setFlags(
                WindowManager.LayoutParams.FLAG_SECURE,
                WindowManager.LayoutParams.FLAG_SECURE);

        // Set fullscreen mode
        getWindow().setFlags(
                WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);

        setContentView(R.layout.activity_main);

        // Display welcome message after a delay
        new Handler().postDelayed(() -> showToast("Akashdip Mahapatra ME 3rdY"), 2000); // Delay: 2000 milliseconds (2 seconds)

        webView = findViewById(R.id.webView);
        videoContainer = findViewById(R.id.videoContainer);

        webView.setWebViewClient(new MyWebViewClient());
        WebSettings webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);

        // Enable fullscreen support for videos
        webView.getSettings().setPluginState(WebSettings.PluginState.ON);
        webView.setWebChromeClient(new MyWebChromeClient());

        // Load your website
       // webView.loadUrl("https://engineering-college-btech.github.io/freecad_app_02/");
        webView.loadUrl("http://freecadapp2.000.pe/index/index.html");
    }


    @Override
    public void onBackPressed() {
        if (webView.canGoBack()) {
            webView.goBack();
        } else {
            super.onBackPressed();
        }
    }

    private class MyWebChromeClient extends WebChromeClient {

        @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
        @Override
        public void onShowCustomView(View view, CustomViewCallback callback) {
            if (customView != null) {
                callback.onCustomViewHidden();
                return;
            }

            customView = view;
            customViewCallback = callback;

            videoContainer.addView(view);
            videoContainer.setVisibility(View.VISIBLE);
            webView.setVisibility(View.GONE);

            setStatusBarVisibility(false);

            // Set screen orientation to landscape when entering fullscreen
            setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_LANDSCAPE);
        }

        @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
        @Override
        public void onHideCustomView() {
            if (customView != null && customViewCallback != null) {
                customViewCallback.onCustomViewHidden();
            }

            videoContainer.removeView(customView);
            videoContainer.setVisibility(View.GONE);
            webView.setVisibility(View.VISIBLE);

            customView = null;

            setStatusBarVisibility(true);

            // Set screen orientation back to portrait when exiting fullscreen
            setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
        }
    }

    @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
    private void setStatusBarVisibility(boolean visible) {
        if (visible) {
            getWindow().getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LAYOUT_STABLE);
        } else {
            getWindow().getDecorView().setSystemUiVisibility(
                    View.SYSTEM_UI_FLAG_LAYOUT_STABLE |
                            View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN |
                            View.SYSTEM_UI_FLAG_FULLSCREEN
            );
        }
    }

    private void showToast(String message) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
    }
}
