<?php

/*
 *
 *  _____   _____   __   _   _   _____  __    __  _____
 * /  ___| | ____| |  \ | | | | /  ___/ \ \  / / /  ___/
 * | |     | |__   |   \| | | | | |___   \ \/ /  | |___
 * | |  _  |  __|  | |\   | | | \___  \   \  /   \___  \
 * | |_| | | |___  | | \  | | |  ___| |   / /     ___| |
 * \_____/ |_____| |_|  \_| |_| /_____/  /_/     /_____/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author iTX Technologies
 * @link https://itxtech.org
 *
 */

namespace pocketmine\entity;

use pocketmine\block\Lava;
use pocketmine\block\Water;
use pocketmine\item\Item as ItemItem;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;


class FishingHook extends Projectile {
    const NETWORK_ID = 77;

    public $width = 0.25;
    public $length = 0.25;
    public $height = 0.25;

    protected $gravity = 0.1;
    protected $drag = 0.05;

    public function __construct(Level $level, CompoundTag $nbt, Entity $shootingEntity = null) {
        parent::__construct($level, $nbt, $shootingEntity);
    }

    public function initEntity() {
        parent::initEntity();
        $this->setDataProperty(self::DATA_OWNER_EID, self::DATA_TYPE_LONG, $this->getOwner()->getId());
    }

    private function getOwner() {
        return $this->shootingEntity;
    }

    public function onUpdate($currentTick) {
        if ($this->closed) {
            return false;
        }
        if ($this->getOwner() === null) {
            $this->close();
            return true;
        }

        $hasUpdate = parent::onUpdate($currentTick);
        if ($this->onGround) {
            $hasUpdate = false;
        }
        if (
        true
        ) {
            if ($this->isInsideOfWater() && $this->level->getBlock($this->add(0, 1)) instanceof Water) {
                $this->setMotion($this->getMotion()->add(0, .1, 0));
                $hasUpdate = true;
            } elseif ($this->level->getBlock($this) instanceof Lava) {
                $this->kill();
            }
        }

        if ($hasUpdate) {
        }
        return $hasUpdate;
    }

    public function kill() {
        $this->setHealth(0);
        $this->getOwner()->reelRod();
        $this->scheduleUpdate();
    }

    public function canCollideWith(Entity $entity) {
        //return $this->canBeHooked($entity) and !$this->onGround;
        return false;
    }

    public function canBeHooked(Entity $entity) {
        return ($entity instanceof Item || (!$entity instanceof Projectile && !$entity instanceof XPOrb && !$entity->getId() == $this->getOwner()->getId()));
    }

    public function retrieve() {
        $this->getOwner()->reelRod();
    }

    public function spawnTo(Player $player) {
        $pk = new AddEntityPacket();
        $pk->eid = $this->getId();
        $pk->type = FishingHook::NETWORK_ID;
        $pk->x = $this->x;
        $pk->y = $this->y;
        $pk->z = $this->z;
        $pk->speedX = $this->motionX;
        $pk->speedY = $this->motionY;
        $pk->speedZ = $this->motionZ;
        $pk->yaw = $this->yaw;
        $pk->pitch = $this->pitch;
        $pk->metadata = $this->dataProperties;
        $player->dataPacket($pk);

        parent::spawnTo($player);
    }
}
