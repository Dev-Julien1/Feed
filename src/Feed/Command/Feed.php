<?php

namespace Feed\Command;

use Feed\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Feed extends Command {
    private $main;
    public function __construct(Main $main) {
        parent::__construct("feed", "vous nourrit", "/feed");
        $this->main = $main;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("feed.use")) {
                if ($sender->getFood() == 20) {
                    $sender->sendMessage("§cVotre nourriture est pleinne");
                }else{
                    $sender->setFood(20);
                    $sender->setSaturation(20);
                    $sender->sendMessage("§aVous avez été nourrit");
                }
            }else{
                $sender->sendMessage("§cVous n'avez pas la permission d'utilisé le /feed");
            }
        }else{
            $this->main->getLogger()->info("Utilisé cette commande en jeu");
        }
    }
}