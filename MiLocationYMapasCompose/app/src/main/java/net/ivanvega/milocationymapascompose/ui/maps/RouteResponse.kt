package net.ivanvega.milocationymapascompose.ui.maps

import com.google.gson.annotations.SerializedName

data class RouteResponse(@SerializedName("features")val feature: List<Feature>)
data class Feature(@SerializedName("geometry")val geometry: List<Geometry>)
data class Geometry(@SerializedName("coordinate")val coordinates: List<List<Double>>)