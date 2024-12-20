package net.ivanvega.milocationymapascompose

import android.os.Build
import android.os.Bundle
import android.widget.Toast
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.annotation.RequiresApi
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.Button
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import com.example.platform.location.locationupdates.LocationUpdatesScreen
import com.example.platform.location.permission.LocationPermissionScreen
import net.ivanvega.milocationymapascompose.ui.location.CurrentLocationScreen
import net.ivanvega.milocationymapascompose.ui.maps.MiMapa
import net.ivanvega.milocationymapascompose.ui.maps.MiMapaOSMDroidCompose
import net.ivanvega.milocationymapascompose.ui.theme.MiLocationYMapasComposeTheme

class MainActivity : ComponentActivity() {
    @RequiresApi(Build.VERSION_CODES.Q)
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            MiLocationYMapasComposeTheme {
                // A surface container using the 'background' color from the theme
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colorScheme.background
                ) {
                    //Greeting("Android")
                    //CurrentLocationScreen()
                    //LocationUpdatesScreen()
                    Box(modifier = Modifier.fillMaxSize()) {
                        MiMapa() //Google
                    }
                    //MiMapaOSMDroidCompose() //Open Street Map
                }
            }
        }
    }
}


