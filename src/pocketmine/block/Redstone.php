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
use pocketmine\item\Tool;

class Redstone extends RedstoneSource{

	protected $id = self::REDSTONE_BLOCK;

	public function __construct(){

	}

	public function getBoundingBox() {
		return Block::getBoundingBox();
	}

	public function canBeFlowedInto(){
		return false;
	}

	public function isSolid(){
		return true;
	}

	public function isActivated(Block $from = null){
		return true;
	}

	public function getHardness() {
		return 5;
	}

	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	public function getName() : string{
		return "Block of Redstone";
	}

	public function getDrops(Item $item) : array {
		if($item->isPickaxe() >= 1){
			return [
				[Item::REDSTONE_BLOCK, 0, 1],
			];
		}else{
			return [];
		}
	}
}
