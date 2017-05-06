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

class Snow extends Solid{

	protected $id = self::SNOW_BLOCK;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getHardness() {
		return 0.2;
	}

	public function getName() : string{
		return "Snow Block";
	}
	
	public function getDrops(Item $item) : array {
		if($item->isShovel() !== false){
			if($item->getEnchantmentLevel(Enchantment::TYPE_MINING_SILK_TOUCH) > 0){
				return [
					[Item::SNOW_BLOCK, 0, 1],
				];
			}else{
				return [
					[Item::SNOWBALL, 0, 4],
				];
			}
		}else{
			return [];
		}
	}
}
