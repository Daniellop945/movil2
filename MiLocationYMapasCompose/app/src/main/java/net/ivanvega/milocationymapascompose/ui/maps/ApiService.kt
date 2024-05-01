package net.ivanvega.milocationymapascompose.ui.maps

import retrofit2.Response
import retrofit2.http.GET
import retrofit2.http.Query

interface ApiService {
    @GET("")
    suspend fun getRoute(
        @Query("api_key") key:String,
        @Query("start") startPoint:String,
        @Query("end") endPoint:String
        ):Response<RouteResponse>
}