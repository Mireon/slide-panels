import Extractor from '@tools/Extractor';
import PanelAnimation from '@modules/Panels/PanelAnimation';
import State from '@tools/State';
import Target from '@entities/Target';
import { C } from '@entities/C';

/**
 * ...
 */
class Panel {
    /**
     * ...
     *
     * @type string
     */
    private readonly id: string;

    /**
     * ...
     *
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * ...
     *
     * @type PanelAnimation
     */
    private readonly animation: PanelAnimation;

    /**
     * ...
     *
     * @type State
     */
    private state: State;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   ...
     */
    public constructor(element: Element) {
        this.id = Extractor.id(element);
        this.side = Extractor.side(element);
        this.animation = new PanelAnimation(element);
        this.state = new State();
    }

    /**
     * ...
     *
     * @param id { string }
     *  ...
     *
     * @return string
     */
    public equalId(id: string): boolean {
        return this.id === id;
    }

    /**
     * ...
     *
     * @return State
     */
    public getState(): State {
        return this.state;
    }

    /**
     * ...
     *
     * @return C.side
     */
    public getSide(): C.side {
        return this.side;
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target): void {
        if (this.state.isHidden()) {
            this.animation.show();
            this.state.show();
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        if (this.state.isVisible()) {
            this.animation.hide();
            this.state.hide();
        }
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public inside(target: Target): void {
        if (this.state.isHidden()) {
            this.animation.inside();
            this.state.show();
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public outside(): void {
        if (this.state.isVisible()) {
            this.animation.outside();
            this.state.hide();
        }
    }
}

export default Panel;
