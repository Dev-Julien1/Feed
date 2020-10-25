<?php

namespace Feed\Command;

use Feed\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Heal extends Command {
    private $main;
    public function __construct(Main $main) {
        parent::__construct("heal", "vous soigne", "/heal");
        $this->main = $main;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("heal.use")) {
                if ($sender->getHealth() == 20) {
                    $sender->sendMessage("§cVotre vie est complette");
                }else{
                    $sender->setHealth(20);
                    $sender->sendMessage("§aVous avez été soigné");
                }
            }else{
                $sender->sendMessage("§cVous n'avez pas la permission d'utilisé le /heal");
            }
        }else{
            $this->main->getLogger()->info("Utilisé cette commande en jeu");
        }
    }
}