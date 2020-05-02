import StageAnimation from './StageAnimation';
import Backstage from './Backstage/Backstage';
import Panels from './Panels/Panels';

/**
 * ...
 */
class Stage {
    /**
     * ...
     */
    private animation: StageAnimation;

    /**
     * ...
     */
    private backstage: Backstage;

    /**
     * ...
     */
    private panels: Panels;

    /**
     * The constructor.
     */
    private constructor() {
        this.animation = new StageAnimation();
        this.backstage = new Backstage();
        this.panels = new Panels();
    }

    /**
     * ...
     *
     * @param target { Array<string> }
     *   ...
     *
     * @return void
     */
    public show(target: Array<string>): void {
        this.animation.show();
        this.backstage.show();
        this.panels.show(target);
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.panels.hide();
        this.backstage.hide();
        this.animation.hide();
    }
}

export default Stage;
