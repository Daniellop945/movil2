package net.ivanvega.milocationymapascompose.model

import android.util.Log
import net.ivanvega.milocationymapascompose.ui.data.ApiServiceFactory
import net.ivanvega.milocationymapascompose.ui.model.Feature
import net.ivanvega.milocationymapascompose.ui.model.Geometry
import net.ivanvega.milocationymapascompose.ui.model.RouteResponse

interface getRoute{
    suspend fun getRoute(Start:String, End:String):RouteResponse
}

class RouteRepository(private val url: String, private val api: String):getRoute{
    override suspend fun getRoute(Start: String, End: String): RouteResponse {
        Log.e("route", Start+", "+End)
        val petition = ApiServiceFactory.makeApiService()
        return RouteResponse(listOf(Feature(Geometry(emptyList()))))
    }
}

