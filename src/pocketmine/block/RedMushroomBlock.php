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

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;


class RedMushroomBlock extends Solid{

	const RED = 14;
	const STEM = 10;

	protected $id = self::RED_MUSHROOM_BLOCK;

	public function __construct($meta = 14){
		$this->meta = $meta;
	}

	public function canBeActivated() : bool {
		return true;
	}

	public function getName() : string{
		return "Red Mushroom Block";
	}

	public function getHardness() {
		return 0.2;
	}

	public function getResistance(){
		return 1;
	}
	
	public function getDrops(Item $item) : array {
		if($item->getEnchantmentLevel(Enchantment::TYPE_MINING_SILK_TOUCH) > 0){
			return [
				[Item::RED_MUSHROOM_BLOCK, self::RED, 1],
			];
		}else{
			return [
				[Item::RED_MUSHROOM, 0, mt_rand(0, 2)],
			];
		}
	}
}
