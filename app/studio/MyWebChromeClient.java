package com.akashdipmahapatra.freecad;

import android.os.Build;
import android.view.View;
import android.webkit.WebChromeClient;

import androidx.annotation.RequiresApi;

public class MyWebChromeClient extends WebChromeClient {

    @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
    @Override
    public void onShowCustomView(View view, CustomViewCallback callback) {
        // Implementation remains the same as before
    }

    @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
    @Override
    public void onHideCustomView() {
        // Implementation remains the same as before
    }
}
