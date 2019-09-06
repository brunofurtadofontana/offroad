

-- -----------------------------------------------------
-- Table `offroadv1`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuNome` VARCHAR(45) NULL,
  `usuCpf` INT(11) NULL,
  `usuNumCel` VARCHAR(45) NULL,
  `usuEmail` VARCHAR(45) NULL,
  `usuTamCamisa` VARCHAR(45) NULL,
  `usuSenha` VARCHAR(45) NULL,
  `usuPrivilegio` VARCHAR(255) NULL,
  `usuCheckin` VARCHAR(255) NULL,
  `usuResSoli` VARCHAR(255) NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC) )
ENGINE = InnoDB;

INSERT INTO `usuario` (`idUsuario`, `usuNome`, `usuCpf`, `usuNumCel`, `usuEmail`, `usuTamCamisa`, `usuSenha`, `usuPrivilegio`, `usuCheckin`) VALUES (NULL, 'admin', '123123123', '1223123123', 'admin@admin.com.br', 'g', 'admin123', 'ADM', NULL);

-- -----------------------------------------------------
-- Table `offroadv1`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`Evento` (
  `idEventos` INT(11) NOT NULL AUTO_INCREMENT,
  `evenNome` VARCHAR(45) NULL,
  `evenDataInicial` DATE NULL,
  `evenDataFinal` DATE NULL,
  `evenHoraInicial` TIME NULL,
  `evenHoraFinal` TIME NULL,
  `evenDescr` VARCHAR(255) NULL,
  `evenTipoTrilha` VARCHAR(45) NULL,
  `evenVlrInscri` DECIMAL(10,2) NULL,
  `evenVlrAlmoco` DECIMAL(10,2) NULL,
  `evenStatusDel` VARCHAR(45) NULL,
  `evenVlrAtualizadol` FLOAT NULL,
  `promoter_idUsuario` INT(11) NOT NULL,
  `evenJustifica` VARCHAR(255) NULL,
  `evenDataSoli` DATETIME NULL,
  PRIMARY KEY (`idEventos`, `promoter_idUsuario`),
  UNIQUE INDEX `idEventos_UNIQUE` (`idEventos` ASC) ,
  INDEX `fk_Evento_promoter1_idx` (`promoter_idUsuario` ASC) ,
  CONSTRAINT `fk_Evento_promoter1`
    FOREIGN KEY (`promoter_idUsuario`)
    REFERENCES `offroadv1`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `offroadv1`.`Endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`Endereco` (
  `idEndereco` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eveRua` VARCHAR(45) NULL,
  `eveBairro` VARCHAR(45) NULL,
  `eveCidade` VARCHAR(45) NULL,
  `eveEstado` VARCHAR(45) NULL,
  `eveLatitude` DOUBLE(10,6) NULL,
  `eveLongitude` DOUBLE(10,6) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idEndereco`, `Evento_idEventos`),
  UNIQUE INDEX `idEndereco_UNIQUE` (`idEndereco` ASC) ,
  INDEX `fk_Endereco_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Endereco_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroadv1`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroadv1`.`Item_Trilha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`Item_Trilha` (
  `idItem_Trilha` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `iteAdesivo` INT(11) NULL,
  `iteBebida` INT(11) NULL,
  `iteAlmoco` INT(11) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idItem_Trilha`, `Evento_idEventos`),
  INDEX `fk_Item_Trilha_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Item_Trilha_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroadv1`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `offroadv1`.`Camisa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`Camisa` (
  `idCamisa` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `camTamP` INT(11) NULL,
  `camTamM` INT(11) NULL,
  `camTamG` INT(11) NULL,
  `camTamGG` INT(11) NULL,
  `camTamEg` INT(11) NULL,

  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idCamisa`, `Evento_idEventos`),
  INDEX `fk_Camisa_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Camisa_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroadv1`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `offroadv1`.`Pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`Pagamento` (
  `idPagamento` INT(11) ZEROFILL NOT NULL AUTO_INCREMENT,
  `pagTipo` VARCHAR(45) NULL,
  `pagValor` FLOAT NULL,
  `pagData` DATE NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  `pagStatus` VARCHAR(45) NULL,
  `pagQrCode` VARCHAR(45) NULL,
  PRIMARY KEY (`idPagamento`, `Evento_idEventos`),
  UNIQUE INDEX `idPagamento_UNIQUE` (`idPagamento` ASC) ,
  INDEX `fk_Pagamento_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Pagamento_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroadv1`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroadv1`.`EnderecoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`EnderecoUsuario` (
  `idEndereco` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `useRua` VARCHAR(45) NULL,
  `useBairro` VARCHAR(45) NULL,
  `useLatitude` DOUBLE(10,6) NULL,
  `useLongitude` DOUBLE(10,6) NULL,
  `promoter_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idEndereco`, `promoter_idUsuario`),
  UNIQUE INDEX `idEndereco_UNIQUE` (`idEndereco` ASC) ,
  INDEX `fk_EnderecoUsuario_promoter1_idx` (`promoter_idUsuario` ASC) ,
  CONSTRAINT `fk_EnderecoUsuario_promoter1`
    FOREIGN KEY (`promoter_idUsuario`)
    REFERENCES `offroadv1`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroadv1`.`Evento_img`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`Evento_img` (
  `idEvento_img` INT(11) NOT NULL AUTO_INCREMENT,
  `eveImgNome` VARCHAR(255) NULL,
  `eveImgData` DATE NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idEvento_img`, `Evento_idEventos`),
  INDEX `fk_Evento_img_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Evento_img_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroadv1`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroadv1`.`Refeicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroadv1`.`Refeicao` (
  `idRefeicao` INT(11) NOT NULL AUTO_INCREMENT,
  `refUser` FLOAT NULL,
  `refEvento` FLOAT NULL,
  `refDesc` VARCHAR(255) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idRefeicao`, `Evento_idEventos`),
  UNIQUE INDEX `idRefeicao_UNIQUE` (`idRefeicao` ASC) ,
  INDEX `fk_Refeicao_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Refeicao_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroadv1`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

