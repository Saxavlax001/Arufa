<?php

 /*
 *                       __   _______                   
 *     /\               / _| |__   __|                  
 *    /  \   _ __ _   _| |_ __ _| | ___  __ _ _ __ ___  
 *   / /\ \ | '__| | | |  _/ _` | |/ _ \/ _` | '_ ` _ \ 
 *  / ____ \| |  | |_| | || (_| | |  __/ (_| | | | | | |
 * /_/    \_\_|   \__,_|_| \__,_|_|\___|\__,_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the Attribution-ShareAlike 4.0 International Licence as published by
 * the Free Software Foundation, either version 4.0 of the License, or
 * (at your option) any later version.
 *
 * @authors PocketMineTeam and ArufaTeam
 * @arufateam AppleDevelops, Derpific, NFGamerMC, Nought57, RateekMCPE, xZeroMCPE
 * @link arufateam.org
 *
*/

namespace pocketmine\block;

use pocketmine\item\Item;


/**
 * Air block
 */
class Air extends Transparent{

	protected $id = self::AIR;
	protected $meta = 0;

	public function __construct(){

	}

	public function getName() : string{
		return "Air";
	}

	public function canPassThrough(){
		return true;
	}

	public function isBreakable(Item $item){
		return false;
	}

	public function canBeFlowedInto(){
		return true;
	}

	public function canBeReplaced(){
		return true;
	}

	public function canBePlaced(){
		return false;
	}

	public function isSolid(){
		return false;
	}

	public function getBoundingBox(){
		return null;
	}

	public function getHardness() {
		return 0;
	}

	public function getResistance(){
		return 0;
	}

}