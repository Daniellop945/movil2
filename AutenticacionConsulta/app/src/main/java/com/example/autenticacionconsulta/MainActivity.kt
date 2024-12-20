package com.example.autenticacionconsulta

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.size
import androidx.compose.material3.Button
import androidx.compose.material3.Card
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import com.example.autenticacionconsulta.ui.theme.AutenticacionConsultaTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            AutenticacionConsultaTheme {
                // A surface container using the 'background' color from the theme
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colorScheme.background
                ) {
                    Login()
                }
            }
        }
    }
}

@Preview
@Composable
fun Login(){
    val matricula = remember{mutableStateOf("")}
    val password = remember{mutableStateOf("")}
    Card (modifier = Modifier.fillMaxSize()){
        Column {
            Text(text = "Sicenet")
        }
        Column(modifier = Modifier
            .fillMaxWidth()
            .align(
                Alignment.CenterHorizontally
            )) {
            Row {
                Text(
                    text = "User ",Modifier.align(Alignment.CenterVertically)
                )
                val user = remember { mutableStateOf("") }
                OutlinedTextField(
                    value = user.value,
                    onValueChange = {user.value = it},
                    label = { Text(text = "Usuario")},
                    isError = user.value.isNotEmpty())
            }
            Row {
                Text(
                    text = "Password",Modifier.align(Alignment.CenterVertically)
                )
                val user = remember { mutableStateOf("") }
                OutlinedTextField(
                    value = user.value,
                    onValueChange = {user.value = it},
                    label = { Text(text = "Password")},
                    isError = user.value.isNotEmpty()
                )
            }
            Row {
                Button(onClick = {}) {
                    Text(text = "Login")
                }
            }
        }
    }
}