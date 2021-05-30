<?php

namespace App\Forms;

use Nette\Application\UI\Form;
use App\Forms\FormFactory;

class EditTaskFormFactory
{

    private $formFactory;

    public function __construct(
        FormFactory $formFactory
    ) {
        $this->formFactory = $formFactory;
    }

    public function create(): Form
    {
        $form = $this->formFactory->create();

        $form->addText("id");

        $form->addText("task")
            ->setRequired("Enter task");

        $form->addText("deadline")
            ->setRequired("Enter task deadline");

        return $form;

    }
}